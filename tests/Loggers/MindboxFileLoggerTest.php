<?php

namespace Mindbox\Tests\Loggers;

use Mindbox\Loggers\MindboxFileLogger;
use org\bovigo\vfs\vfsStream;
use org\bovigo\vfs\vfsStreamDirectory;
use PHPUnit\Framework\TestCase;
use Psr\Log\LogLevel;

/**
 * Class MindboxFileLoggerTest
 * @package Mindbox\Tests\Loggers
 */
class MindboxFileLoggerTest extends TestCase
{
    /**
     * @var  vfsStreamDirectory
     */
    private $root;

    /**
     * @var string
     */
    private $filePath;

    /**
     * @var string
     */
    private $fileName;

    /**
     * @return array
     */
    public function acceptableLogLevelsDataProvider()
    {
        return [
            [
                'DEBUG',
            ],
            [
                'debug',
            ],
            [
                'deBug',
            ],
            [
                550,
            ],
            [
                null,
            ],
        ];
    }

    /**
     * @return array
     */
    public function incorrectLogLevelsDataProvider()
    {
        return [
            [
                'errors',
            ],
            [
                '',
            ],
        ];
    }

    /**
     */
    public function setUp(): void
    {
        $this->root     = vfsStream::setup('exampleDir');
        $this->filePath = MindboxFileLogger::getLogDirPath();
        $this->fileName = MindboxFileLogger::LOG_FILE_NAME;
    }

    /**
     * @dataProvider acceptableLogLevelsDataProvider
     *
     * @param mixed $logLevel
     */
    public function testLoggerConstructor($logLevel)
    {
        $dirPath = 'logs' . DIRECTORY_SEPARATOR . $this->filePath;
        $this->assertFalse($this->root->hasChild($dirPath));

        $logger = new MindboxFileLogger(vfsStream::url('exampleDir/logs'), $logLevel);

        $this->assertTrue($this->root->hasChild($dirPath));

        $this->assertInstanceOf(MindboxFileLogger::class, $logger);
    }

    /**
     */
    public function testLogWrites()
    {
        $logger = new MindboxFileLogger(vfsStream::url('exampleDir/logs'));

        $filePath = 'logs' . DIRECTORY_SEPARATOR . $this->filePath . DIRECTORY_SEPARATOR . $this->fileName;

        $this->assertFalse($this->root->hasChild($filePath));

        $logger->log(LogLevel::ERROR, 'someMessage', ['argName' => 'argValue', 'argName1' => 'argValue1']);

        $this->assertTrue($this->root->hasChild($filePath));
    }

    /**
     */
    public function testLogNotWrites()
    {
        $logger = new MindboxFileLogger(vfsStream::url('exampleDir/logs'));

        $filePath = 'logs' . DIRECTORY_SEPARATOR . $this->filePath . DIRECTORY_SEPARATOR . $this->fileName;

        $this->assertFalse($this->root->hasChild($filePath));

        $logger->log(LogLevel::WARNING, 'someMessage', ['argName' => 'argValue', 'argName1' => 'argValue1']);

        $this->assertFalse($this->root->hasChild($filePath));
    }

    /**
     * @dataProvider incorrectLogLevelsDataProvider
     *
     * @param mixed $logLevel
     */
    public function testHandlerConstructorThrowsExceptionWhenLogLevelIncorrect($logLevel)
    {
        $this->expectException(\Mindbox\Exceptions\MindboxConfigException::class);

        new MindboxFileLogger(vfsStream::url('exampleDir/logs'), $logLevel);
    }

    public function testLoggerConstructorThrowException()
    {
        $this->expectException(\Mindbox\Exceptions\MindboxConfigException::class);

        $this->root->chmod(0000);
        new MindboxFileLogger(vfsStream::url('exampleDir/logs2'));
    }
}
