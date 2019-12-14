<?php

declare(strict_types=1);

namespace App\Service;

use Psr\Log\LoggerInterface;
use Symfony\Component\HttpFoundation\File\Exception\FileException;
use Symfony\Component\HttpFoundation\File\UploadedFile;

class FileUploader
{
    private $targetDirectory;

    /**
     * @var LoggerInterface
     */
    private $logger;

    public function __construct($targetDirectory, LoggerInterface $logger)
    {
        $this->targetDirectory = $targetDirectory;
        $this->logger = $logger;
    }

    /**
     * @param UploadedFile[] $files
     *
     * @return array
     */
    public function upload(array $files)
    {
        $fileNames = [];

        foreach ($files as $file) {
            $originalFilename = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);
            $safeFilename = transliterator_transliterate(
                'Any-Latin; Latin-ASCII; [^A-Za-z0-9_] remove; Lower()',
                $originalFilename
            );
            $fileName = $safeFilename.'-'.uniqid().'.'.$file->guessExtension();
            $fileNames[] = $fileName;
            //chown($this->getTargetDirectory(), 777);
            $file->move($this->getTargetDirectory(), $fileName);
        }

        return $fileNames;
    }

    public function getTargetDirectory()
    {
        return $this->targetDirectory;
    }
}