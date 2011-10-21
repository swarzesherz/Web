<?
if ($_REQUEST["debug"] != True){
  header('Content-Type: text/xml');
}

$docs = getAlphabeticList();

?>
<SERIALLIST> 
 <CONTROLINFO> 
  <DATETIME><?=date("Ymd hms")?></DATETIME> 
  <LANGUAGE><?= $lng?></LANGUAGE> 
  <STANDARD>iso</STANDARD> 
  <PAGE_NAME><?= $script?></PAGE_NAME> 
  <APP_NAME><?= $conf["SITE_INFO"]["APP_NAME"]?></APP_NAME> 
  <SITE_NAME><?= $conf["SITE_INFO"]["SITE_NAME"]?></SITE_NAME>
  <ENABLE_STAT_LINK><?= $conf["LOG"]["ENABLE_STATISTICS_LINK"]?></ENABLE_STAT_LINK> 
  <ENABLE_CIT_REP_LINK><?= $conf["LOG"]["ENABLE_CITATION_REPORTS_LINK"]?></ENABLE_CIT_REP_LINK> 
  <ENABLE_COAUTH_REPORTS_LINK><?= $conf["LOG"]["ENABLE_COAUTH_REPORTS_LINK"]?></ENABLE_COAUTH_REPORTS_LINK> 
  <NO_SCI_SERIAL>no</NO_SCI_SERIAL> 
  <SCIELO_INFO> 
   <SERVER><?= $_SERVER['HTTP_HOST']?></SERVER> 
   <PATH_WXIS>/cgi-bin/wxis.exe</PATH_WXIS> 
   <PATH_CGI-BIN><?= $conf["PATH"]["PATH_CGI-BIN"]?></PATH_CGI-BIN> 
   <PATH_DATA><?= $conf["PATH"]["PATH_DATA"]?></PATH_DATA> 
   <PATH_SCRIPTS><?= $conf["PATH"]["PATH_SCRIPTS"]?></PATH_SCRIPTS> 
   <PATH_SERIAL_HTML><?= $conf["PATH"]["PATH_SERIAL_HTML"]?></PATH_SERIAL_HTML> 
   <PATH_XSL><?= $conf["PATH"]["PATH_XSL"]?></PATH_XSL> 
   <PATH_GENIMG><?= $conf["PATH"]["PATH_GENIMG"]?></PATH_GENIMG> 
   <PATH_SERIMG><?= $conf["PATH"]["PATH_SERIMG"]?></PATH_SERIMG> 
   <PATH_DATA_IAH>/iah/</PATH_DATA_IAH> 
   <PATH_CGI_IAH>iah/</PATH_CGI_IAH> 
   <PATH_HTDOCS><?= $conf["PATH"]["PATH_HTDOCS"]?></PATH_HTDOCS> 
   <STAT_SERVER_CITATION><?= $conf["SCIELO"]["STAT_SERVER_CITATION"]?></STAT_SERVER_CITATION> 
   <STAT_SERVER_COAUTH><?= $conf["SCIELO"]["STAT_SERVER_COAUTH"]?></STAT_SERVER_COAUTH> 
   <GOOGLE_CODE><?= $conf["LOG"]["GOOGLE_CODE"]?></GOOGLE_CODE> 
  </SCIELO_INFO> 
 </CONTROLINFO> 
 
 <SCIELOINFOGROUP> 
  <SITE_NAME><?= $conf["SITE_INFO"]["SITE_NAME"]?></SITE_NAME> 
  <ORGANIZATION><?= $conf["SITE_INFO"]["SITE_AUTHOR"]?></ORGANIZATION> 
  <ADDRESS> 
   <ADDRESS_1><?= $conf["SITE_INFO"]["ADDRESS_1"]?></ADDRESS_1> 
   <ADDRESS_2><?= $conf["SITE_INFO"]["ADDRESS_2"]?></ADDRESS_2> 
   <COUNTRY><?= $conf["SITE_INFO"]["COUNTRY"]?></COUNTRY> 
  </ADDRESS> 
  <PHONE><?= $conf["SITE_INFO"]["PHONE_NUMBER"]?></PHONE> 
  <FAX><?= $conf["SITE_INFO"]["FAX_NUMBER"]?></FAX> 
  <EMAIL><?= $conf["SITE_INFO"]["E_MAIL"]?></EMAIL> 
 </SCIELOINFOGROUP> 

 <COPYRIGHT YEAR="<?date("Y")?>"> 
  <OWNER><?= $conf["SITE_INFO"]["SHORT_NAME"]?></OWNER> 
  <OWNER-FULLNAME><?= $conf["SITE_INFO"]["SITE_NAME"]?></OWNER-FULLNAME> 
  <CONTACT><?= $conf["SITE_INFO"]["E_MAIL"]?></CONTACT> 
 </COPYRIGHT> 
 <LIST>
<?
$list = "";
ksort($docs);
foreach ($docs as $title=>$doc){
?>
  <SERIAL QTYISS="<?=$doc['issues_total']?>">
    <TITLE ISSN="<?=$doc['issn']?>"><![CDATA[<?=$doc['title']?>]]></TITLE>
    <journal-status-history>
      <?if ($doc['history'][0]['d'] != ""){?>
        <current-status date="<?=$doc['history'][0]['c']?>" status="<?=$doc['history'][0]['d']?>"/> 
      <?}else{?>
        <current-status date="<?=$doc['history'][0]['a']?>" status="<?=$doc['history'][0]['b']?>"/> 
      <?}?>
      <periods>      
      <?foreach ($doc['history'] as $hist){?>
          <period> 
            <begin date="<?=$doc['history'][0]['a']?>" status="<?=$doc['history'][0]['b']?>"/> 
            <?if ($doc['history'][0]['d'] != ""){?>
              <end date="<?=$doc['history'][0]['c']?>" status="<?=$doc['history'][0]['d']?>"/>
            <?}?>
          </period> 
      <?}?>
      </periods> 
    </journal-status-history> 
  </SERIAL>
<?
}
?>
 </LIST>
 </SERIALLIST>