<?php
require_once 'autoload.php';
require_once '../vendor/autoload.php';

class CheckinDataTest extends PHPUnit_Framework_TestCase{

    public function __construct() {
        parent::__construct();
    }

    protected function setUp(){
    }

    public static function tearDownAfterClass()
    {
        //unlink(DB_FILENAME);
    }

    public function testSampleImage(){
        $q = new \Uzulla\QrCode\Image();
        $q->set_qrcode_version(1);
        $q->set_qrcode_error_correct("M");
        $q->set_module_size(3);
        $q->set_quietzone(5);

        // 作成できるかテスト
        $data = '12345670';
        $this->assertTrue($q->qrcode_image_out($data, 'png', '__tmp.png'));

        // 前もって作成したファイルと比較
        $raw = file_get_contents('__tmp.png');
        $compare_raw = file_get_contents('sample_1_M_3_5_12345670.png');
        $this->assertEquals($compare_raw, $raw);

        // テンポラリファイル削除
        unlink('__tmp.png');

    }


}