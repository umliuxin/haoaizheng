<!DOCTYPE html>
<html>
<head>
    <title></title>
    <meta http-equiv='Content-Type' content='text/html; charset=utf-8' /> 
</head>
</html>
<?php
/**
  * wechat php test
  */

//define your token
header("Content-Type: text/html;charset=gbk"); 

define("TOKEN", "umliuxin");

require_once('db_test.php');
$wechatObj = new wechatCallbackapiTest();
$wechatObj->responseMsg();
//$wechatObj->valid();


class wechatCallbackapiTest
{
    /*public function valid()
    {
        $echoStr = $_GET["echostr"];

        //valid signature , option
        if($this->checkSignature()){
            echo $echoStr;
            exit;
        }
    }*/

    public function responseMsg()
    {
        //get post data, May be due to the different environments
        $postStr = "<xml>
 <ToUserName>ToUserName</ToUserName>
 <FromUserName>TEST2</FromUserName> 
 <CreateTime>1348831860</CreateTime>
 <MsgType>text</MsgType>
 <Content>3</Content>
 <MsgId>1234567890123456</MsgId>
 </xml>";
        //echo $postStr;

        //extract post data
        if (!empty($postStr)){
                
                $postObj = simplexml_load_string($postStr, 'SimpleXMLElement', LIBXML_NOCDATA);
                $RX_TYPE = trim($postObj->MsgType);

                switch($RX_TYPE)
                {
                    case "text":
                        $resultStr = $this->handleText($postObj);
                        break;
                    case "event":
                        $resultStr = $this->handleEvent($postObj);
                        break;
                    default:
                        $resultStr = "Unknow msg type: ".$RX_TYPE;
                        break;
                }
                //echo $resultStr;
        }else {
            echo "";
            exit;
        }
    }

    public function handleText($postObj)
    {
        $fromUsername = $postObj->FromUserName;
        //echo $fromUsername;
        $toUsername = $postObj->ToUserName;
        $keyword = trim($postObj->Content);
        echo empty($keyword)."<br>";
        $time = time();
        $textTpl = "<xml>
                    <ToUserName><![CDATA[%s]]></ToUserName>
                    <FromUserName><![CDATA[%s]]></FromUserName>
                    <CreateTime>%s</CreateTime>
                    <MsgType><![CDATA[%s]]></MsgType>
                    <Content><![CDATA[%s]]></Content>
                    <FuncFlag>0</FuncFlag>
                    </xml>";             
       
            $msgType = "text";
            $contentStr = response_text_generate($keyword,$fromUsername);
            echo $contentStr;
            $resultStr = sprintf($textTpl, $fromUsername, $toUsername, $time, $msgType, $contentStr);
            //echo $resultStr;
            return $resultStr;
       
    }

    public function handleEvent($object)
    {
        $contentStr = "??";
        if($object->Event=="subscribe"){
            $contentStr = "哈哈"."\n"."欢迎来到了好爱争的世界"."\n"."可是我还没有功能"."\n"."敬请期待";
            addUser($object->FromUserName);
        }
        else if($object->Event=="unsubscribe"){
            $contentStr = "你不要走啊!";
        }
        else{
            $contentStr = "Unknow Event: ".$object->Event;
        }
        
        $resultStr = $this->responseText($object, $contentStr);
        return $resultStr;
    }
    
    public function responseText($object, $content, $flag=0)
    {
        $textTpl = "<xml>
                    <ToUserName><![CDATA[%s]]></ToUserName>
                    <FromUserName><![CDATA[%s]]></FromUserName>
                    <CreateTime>%s</CreateTime>
                    <MsgType><![CDATA[text]]></MsgType>
                    <Content><![CDATA[%s]]></Content>
                    <FuncFlag>%d</FuncFlag>
                    </xml>";
        $resultStr = sprintf($textTpl, $object->FromUserName, $object->ToUserName, time(), $content, $flag);
        echo "\n".$resultStr;
        return $resultStr;
    }

    private function checkSignature()
    {
        $signature = $_GET["signature"];
        $timestamp = $_GET["timestamp"];
        $nonce = $_GET["nonce"];    
                
        $token = TOKEN;
        $tmpArr = array($token, $timestamp, $nonce);
        sort($tmpArr);
        $tmpStr = implode( $tmpArr );
        $tmpStr = sha1( $tmpStr );
        
        if( $tmpStr == $signature ){
            return true;
        }else{
            return false;
        }
    }

}

?>