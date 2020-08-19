<?php

namespace AppBundle\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\HttpKernel\KernelInterface;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\Filesystem\Exception\IOExceptionInterface;
use Symfony\Component\Filesystem\Filesystem;
use League\Csv\Reader;
use League\Csv\Statement;
use AppBundle\Entity\Postcode;

class ImportPostcodesCommand extends Command {
    // the name of the command (the part after "bin/console")
    protected static $defaultName = 'app:import-postcodes';
    
    private $container;
    protected $projectDir;

    public function __construct(KernelInterface $kernel)
    {
        parent::__construct();
        $this->container = $kernel->getContainer();;
        $this->projectDir = $kernel->getProjectDir();
    }
    protected function configure()
    {
        $this
        // the short description shown while running "php bin/console list"
        ->setDescription('Imports postcodes');
        $this
        // configure an argument
        ->addArgument('zipfile', InputArgument::REQUIRED, 'Location of zip file on system');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $em = $this->container->get('doctrine')->getManager();
        $zipfile = $input->getArgument('zipfile');
        $output->writeLn(['This is a test']);
        $output->writeln('zipfile: '.$zipfile);
        $filesystem = new Filesystem();
        $path = $this->projectDir.'/../var/unziped';
        $data = $path."/Data";
        $output->writeLn(['Output Path',$path]);
        try {
            $filesystem->mkdir($path);
        } catch (IOExceptionInterface $exception) {
            $output->writeLn(["An error occurred while creating your directory at ".$exception->getPath()]);
            
        }
        
        $zip = new \ZipArchive;
        $res = $zip->open($zipfile);
        if ($res === TRUE) {
            
            $zip->extractTo($path);
            $zip->close();
            
            $csv = Reader::createFromPath($path.'/Data/ONSPD_MAY_2020_UK.csv', 'r');
            
           // $headers = $csv->fetchOne();
//            for($i=0;$i<sizeof($headers);$i++){
//                $output->writeLn([$headers[$i],"Header number ".$i]);
//            }
            //$header = implode(',',$csv->fetchOne()); //returns the CSV header record
            // postcode 0
            // lat 42
            // long 43
           // Fixing this at 25 to save time if I have time later I will fix to add all records.
            
            // Going to leave output->writeLn in for now.
            $records = $csv->setOffset(1)->setLimit(25)->fetchAll();
            for($i=0;$i<sizeof($records);$i++){ // Not checking for existing at this point.
                $postcode = new Postcode();
                $postcode->setPostcode($records[$i][0]);
                $postcode->setLat($records[$i][42]);
                $postcode->setLon($records[$i][43]);
                $output->writeLn(['lat '.$postcode->getlat(),'lon '.$postcode->getlon()]);

                $em->persist($postcode);
                $em->flush();
                $output->writeLn(['ID '.$postcode->getId()]);
            }
            $output->writeLn(['Num Records',sizeof($records)]);
            
            $filesystem->remove([$path]);
            $output->writeLn(['ok']);
        } else {
            $output->writeLn(['failed']);
        }
        
        
        
    }
}
