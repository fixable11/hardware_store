<?php

declare(strict_types=1);

namespace App\Service;

use Psr\Log\LoggerInterface;
use Symfony\Component\Filesystem\Filesystem;
use Symfony\Component\HttpFoundation\File\Exception\FileException;
use Symfony\Component\HttpFoundation\File\UploadedFile;

class FileUploader
{
    private $targetDirectory;

    /**
     * @var LoggerInterface
     */
    private $logger;
    /**
     * @var Filesystem
     */
    private $filesystem;

    public function __construct($targetDirectory, LoggerInterface $logger, Filesystem $filesystem)
    {
        $this->targetDirectory = $targetDirectory;
        $this->logger = $logger;
        $this->filesystem = $filesystem;
    }

    /**
     * @param UploadedFile[] $files
     *
     * @return array
     * @throws \Exception
     */
    public function upload(array $files)
    {
        $fileNames = [];
        $this->filesystem->mkdir($this->getTargetDirectory());

        foreach ($files as $file) {

            if (! preg_match('/^data:image\/(\w+);base64,/', $file, $type)) {
                throw new \Exception('did not match data URI with image data');
            }

            $data = substr($file, strpos($file, ',') + 1);
            $type = strtolower($type[1]); // jpg, png, gif

            if (!in_array($type, [ 'jpg', 'jpeg', 'gif', 'png' ])) {
                throw new \Exception('invalid image type');
            }

            $data = base64_decode($data);

            if ($data === false) {
                throw new \Exception('base64_decode failed');
            }

            $fileName = uniqid(). '.'. $type;
            $fileNames[] = $fileName;

            file_put_contents($this->getTargetDirectory() . '/' . $fileName, $data);
        }

        return $fileNames;
    }

    public function getTargetDirectory()
    {
        return $this->targetDirectory;
    }
}