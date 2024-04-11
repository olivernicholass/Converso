<?php


use PHPUnit\Framework\TestCase;

class IndexTest extends TestCase {
    public function testPageLoads() {
        
        $this->assertNotEmpty(file_get_contents('http://localhost/fanpit/src/index.php'), "Index failed");
        //$this->assertTrue(true, "Database connection test passed");
        $this->assertNotEmpty(file_get_contents('http://localhost/fanpit/src/edit-profile.php'), "edit-profile failed");
        $this->assertNotEmpty(file_get_contents('http://localhost/fanpit/src/login.php'), "login failed");
        $this->assertNotEmpty(file_get_contents('http://localhost/fanpit/src/messages.php'), "messages failed");
        $this->assertNotEmpty(file_get_contents('http://localhost/fanpit/src/notifications.php'), "notifications failed");
        $this->assertNotEmpty(file_get_contents('http://localhost/fanpit/src/post.php'), "post failed");
        $this->assertNotEmpty(file_get_contents('http://localhost/fanpit/src/profile.php'), "profile failed");
        $this->assertNotEmpty(file_get_contents('http://localhost/fanpit/src/register.php'), "register failed");
        $this->assertNotEmpty(file_get_contents('http://localhost/fanpit/src/reply.php'), "reply failed");
        $this->assertNotEmpty(file_get_contents('http://localhost/fanpit/src/thread.php'), "thread failed");

    }

    public function testDatabaseConnection() {
        $connection = require_once 'src/connect.php';
        $this->assertNotNull($connection, "Failed to connect to the database.");
    }
}