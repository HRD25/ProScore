<?php

namespace App\Factory\Implementation;

use App\Entity\File;
use App\Factory\FileFactoryInterface;
use Ramsey\Uuid\Uuid;
use Symfony\Component\DependencyInjection\ParameterBag\ParameterBagInterface;
use Symfony\Component\HttpFoundation\Request;

class FileFactory implements FileFactoryInterface
{

    public function __construct(
        private readonly ParameterBagInterface $parameterBag
    ){}

    public function create(Request $request): File
    {
        $filePath = $this->parameterBag->get('userPath').'/files/';
        $fileParams = $this->createFileToPath($request, $filePath);

        return new File(
            $fileParams['fileName'],
            $fileParams['fileOriginalName'],
            $fileParams['extension']
        );
    }

    private function createFileToPath(Request $request, string $filePath): ?array
    {
        $requestFile = $request->files->get('file');
        if(is_null($requestFile) === false){
            $fileOriginalExtension = $requestFile->guessExtension();
            $fileName = Uuid::uuid4()->toString().".".$fileOriginalExtension;
            $fileOriginalName = $requestFile->getClientOriginalName();
            $requestFile->move($filePath, $fileName);

            return [
                'fileOriginalName' => $fileOriginalName,
                'fileName' => $fileName,
                'extension' => $fileOriginalExtension,
            ];
        }

        return null;
    }
}