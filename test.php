<?php
echo memory_get_usage();
echo "\n";
$bytearray = new ByteArray();
echo memory_get_usage();
echo "\n";
$bytearray->writeBoolean('true');
$bytearray->writeUTF("this is a good test!");
$byte = 1;
$bytearray->writeByte($byte);
$bytearray->writeUTF("this is a good test!");
echo $bytearray->readBoolean();
echo "\n";
echo $bytearray->readUTF();
echo "\n";
echo $bytearray->readByte();
echo "\n";
echo $bytearray->readUTF();
echo "\n";
$a = $bytearray->toString();
var_dump($bytearray);
$b4 = new ByteArray();
$b4->writeInt(strlen($a));
$b4->writeBytes($a);
$len = $b4->readInt();
echo "\n";
echo "read bytes:";
echo $len;
$bytes = $b4->readBytes($len);

echo "\n";
echo "bytes md5:";
echo md5($bytes);
echo "\n";
echo "bytes md5:";
echo md5($a);
echo "\n";
var_dump($b4);

$bytearray->compress();
echo "compress\n";
var_dump($bytearray);
$b = $bytearray->toString();
$b2 = new ByteArray($a);
echo $b2->readBoolean();
echo "\n";
echo $b2->readUTF();
echo "\n";
var_dump($b2);
$b3 = new ByteArray($b);
var_dump($b3);
$b3->uncompress();
echo $b3->readBoolean();
echo "\n";
echo $b3->readUTF();
echo "\n";
var_dump($b3);

echo memory_get_usage();
echo "\n";
$ba1 = new ByteArray();
for($i = 0; $i < 20000; $i++) {
    $ba1->writeUTF("this is a test!!!");
}
echo memory_get_usage();
echo "\n";
var_dump($ba1);
