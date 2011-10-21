<?
if ($_REQUEST["debug"] != "yes"){
  header('Content-Type: text/xml');
}


// GETTING SERIAL
$serial = getSerialMetadata($pid);

// CONSTRUCTING ISSUE METADATA
$issue =  getIssueMetadata($pid);

// CONSTRUCTION TABLE OF CONTENTS (QUERY-2)
$sections = getTableOfContents($pid);

//die(var_dump($sections));
//die(var_dump($docs[0]));

?>
<SERIAL LASTUPDT="<?=date("Ymd hms")?>"> 
 <CONTROLINFO> 
  <DATETIME><?=date("Ymd hms")?></DATETIME> 
  <LANGUAGE><?= $lng?></LANGUAGE> 
  <STANDARD>iso</STANDARD> 
  <PAGE_NAME><?= $script?></PAGE_NAME> 
  <PAGE_ID><?= $pid?></PAGE_ID>
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

  <?if ($serial['timeLine']['future']){?>
    <FUTURE_ISSUES>
      <?foreach ($serial['timeLine']['future'] as $key=>$value){?>
      <FUTURE_ISSUE PID="<?=$value['pid']?>" <?if ($value['vol'] != "") {?>VOL="<?=$value['vol']?>"<?}?> NUM="<?=strtoupper($value['num'])?>" />
      <?}?>
    </FUTURE_ISSUES>
   <?}?>
   <ISSUES>
   <?if ($serial['timeLine']['previous']['pid'] != ""){?>
    <PREVIOUS PID="<?=$serial['timeLine']['previous']['pid']?>" VOL="<?=$serial['timeLine']['previous']['vol']?>" NUM="<?=$serial['timeLine']['previous']['num']?>" />
    <?}?>
    <?if ($serial['timeLine']['next']['pid'] != ""){?>
      <NEXT PID="<?=$serial['timeLine']['next']['pid']?>" <?if ($serial['timeLine']['next']['vol'] != "") {?>VOL="<?=$serial['timeLine']['next']['vol']?>"<?}?> NUM="<?=strtoupper($serial['timeLine']['next']['num'])?>" />
    <?}?>
  </ISSUES>
 </CONTROLINFO>
 
  <TITLEGROUP>
  <TITLE><![CDATA[<?=$serial['title']?>]]></TITLE>
  <SHORTTITLE><![CDATA[<?= $serial['shortTitle']?>]]></SHORTTITLE>
  <SHORTTITLE-MEDLINE><![CDATA[<?= $serial['shortTitleMedline']?>]]></SHORTTITLE-MEDLINE>
  <SIGLUM><?= $serial['siglum']?></SIGLUM>
  <?foreach ($serial['subjects'] as $value) {?>
    <SUBJECT><![CDATA[<?=$value?>]]></SUBJECT>
  <?}?>
 </TITLEGROUP> 

  <journal-status-history>
    <?if ($serial['history'][0]['d'] != ""){?>
      <current-status date="<?=$serial['history'][0]['c']?>" status="<?=$serial['history'][0]['d']?>"/> 
    <?}else{?>
      <current-status date="<?=$serial['history'][0]['a']?>" status="<?=$serial['history'][0]['b']?>"/> 
    <?}?>
    <periods>      
    <?foreach ($serial['history'] as $hist){?>
        <period> 
          <begin date="<?=$serial['history'][0]['a']?>" status="<?=$serial['history'][0]['b']?>"/> 
          <?if ($serial['history'][0]['d'] != ""){?>
            <end date="<?=$serial['history'][0]['c']?>" status="<?=$serial['history'][0]['d']?>"/>
          <?}?>
        </period> 
    <?}?>
    </periods> 
  </journal-status-history> 
  <CHANGESINFO>
    <FORMERTITLE>
      <TITLE><![CDATA[<?=$serial['formerTitle']?>]]></TITLE>
    </FORMERTITLE>
  </CHANGESINFO>
  <ISSN_AS_ID><?=$serial['issnAsId']?></ISSN_AS_ID>
  <ISSN><?=$serial['issn']?></ISSN>
  <ISSUE_ISSN TYPE="<?=$serial['issnType']?>"><?=$serial['issnAsId']?></ISSUE_ISSN>
  <PUBLISHERS>
    <?foreach ($serial['publishers'] as $value) {?>
      <PUBLISHER>
        <NAME><![CDATA[<?=$value?>]]></NAME>
      </PUBLISHER>
    <?}?>
  </PUBLISHERS>
  <MISSION><![CDATA[<?=$serial['mission']?>]]></MISSION>
  <COPYRIGHT YEAR="<?=date('Y')?>"><![CDATA[<?=$serial['title']?>]]></COPYRIGHT>
  <CONTACT>
    <LINES>
      <?foreach ($serial['address'] as $value){?>
      <LINE><![CDATA[<?=$value?>]]></LINE>
      <?}?>
    </LINES>
    <EMAILS>
      <EMAIL><?=$serial['email']?></EMAIL>
    </EMAILS>
 </CONTACT>

<ISSUE VOL="<?=$issue['vol']?>" NUM="<?=$issue['num']?>" PUBDATE="<?=$issue['pubDate']?>" STATUS="">
<STRIP LANG="en">
<SHORTTITLE><![CDATA[<?=$issue['shortTitle']?>]]></SHORTTITLE>
<VOL><?=$issue['info']['v']?></VOL>
<NUM><?=$issue['info']['n']?></NUM>
<CITY><?=$issue['info']['c']?></CITY>
<MONTH><?=$issue['info']['m']?></MONTH>
<YEAR><?=$issue['info']['a']?></YEAR>
</STRIP>
<?foreach ($sections as $sectionKey=>$section){?>
  <SECTION>
    <?if (trim($sectionKey) != "nd"){?><NAME><![CDATA[<?=$issue['sections'][$sectionKey]?>]]></NAME><?}?>
    <?foreach ($section as $articleKey=>$article){?>
      <ARTICLE PID="<?=$articleKey?>" TEXT_LANG="<?=$article['pid']?>" entrdate="">
        <LANGUAGES MAXLINES="<?=count($article['abstractLanguages'])?>">
          <ABSTRACT_LANGS>
            <?foreach ($article['abstractLanguages'] as $avLanguage){?>
              <LANG><?=$avLanguage?></LANG>
            <?}?>
          </ABSTRACT_LANGS>
          <ART_TEXT_LANGS>
            <?foreach ($article['files']['html'] as $htmlLanguageKey=>$htmlLanguage){?>
              <LANG TRANSLATION="<?=$htmlLanguage?>"><?=$htmlLanguageKey?></LANG>
            <?}?>
          </ART_TEXT_LANGS>
          <PDF_LANGS>
            <?foreach ($article['files']['pdf'] as $htmlLanguageKey=>$htmlLanguage){?>
              <LANG TRANSLATION="<?=$htmlLanguage?>"><?=$htmlLanguageKey?></LANG>
            <?}?>
          </PDF_LANGS>
        </LANGUAGES>
        <TITLE><![CDATA[<b><?=$article['title']?></b>]]></TITLE>
        <SUBTITLE><![CDATA[<?=$article['subTitle']?>]]></SUBTITLE>
        <AUTHORS>
          <AUTH_PERS>
            <?foreach ($article['authors'] as $author) {?>
                <AUTHOR SEARCH="<?=$author['search']?>">
                  <AFF xref="<?=$author['affiliation']?>"/>
                  <NAME><![CDATA[<?=$author['name']?>]]></NAME>
                  <SURNAME><![CDATA[<?=$author['surName']?>]]></SURNAME>
               </AUTHOR>
            <?}?>
          </AUTH_PERS>
        </AUTHORS>
      </ARTICLE>
    <?}?>
  </SECTION>
<?}?>
</ISSUE>
</SERIAL>