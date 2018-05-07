<?php
/**
 * This is project's console commands configuration for Robo task runner.
 *
 * @see http://robo.li/
 */
class RoboFile extends \Robo\Tasks
{
    /**
     * Runs tests suite of the project
     */
    public function test()
    {
        $cmd = [];
        $cmd[] = './vendor/bin/phpunit tests';
        $cmd[] = '--coverage-html coverage/html';
        $cmd[] = '--coverage-clover coverage/xml';
        $cmd[] = '--whitelist ./src';
        $this->_exec(implode(' ', $cmd));
    }

    /**
     * Sends coverage result to Codacy
     */
    public function coverageSend() {
        $this->_exec('./vendor/bin/codacycoverage clover coverage/xml');
    }

    /**
     * Opens coverage
     */
    public function coverageOpen() {
        $this->_exec('open coverage/html/index.html');
    }

    /**
     * Performs static analysis
     */
    public function analysis() {
        $this->_exec('vendor/bin/phpstan analyse src tests --level=7');
    }
}
