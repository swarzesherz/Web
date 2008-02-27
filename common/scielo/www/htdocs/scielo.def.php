[SITE_INFO]
SITE_NAME=SciELO - Scientific Electronic Library Online
SHORT_NAME=Scielo Brazil
SITE_AUTHOR=FAPESP - BIREME
ADDRESS_1=Rua Botucatu, 862 - Vila Clementino
ADDRESS_2=04023-901 S�o Paulo SP
COUNTRY=Brasil
PHONE_NUMBER="+55 11 5576-9863"
FAX_NUMBER="+55 11 5575-8868"
E_MAIL=scielo@bireme.br
STANDARD_LANG=en
APP_NAME=scielo

[LILACS]
SERVER_LILACS=www.bireme.br
PATH_WXIS_LILACS=/cgi-bin/wxislind.exe
PATH_CGI_BIN_IAH_LILACS=iah/
PATH_DATA_IAH_LILACS=/iah/online/

[MEDLINE]
SERVER_MEDLINE=www.bireme.br
PATH_WXIS_MEDLINE=/cgi-bin/wxislind.exe
PATH_CGI_BIN_IAH_MEDLINE=iah/
PATH_DATA_IAH_MEDLINE=/iah/online/

[SCIELO]
SERVER_SCIELO=vm.scielo.br
PATH_WXIS_SCIELO=/cgi-bin/wxis.exe
PATH_CGI_BIN_IAH_SCIELO=iah/
PATH_DATA_IAH_SCIELO=/iah/

[ADOLEC]
SERVER_ADOLEC=www.bireme.br
PATH_WXIS_ADOLEC=/cgi-bin/wxislind.exe
PATH_CGI_BIN_IAH_ADOLEC=iah/
PATH_DATA_IAH_ADOLEC=/iah/online/

[PATH]
PATH_DATA=/
PATH_CGI-BIN=/cgi-bin/
PATH_SCRIPTS=ScieloXML/
PATH_GENIMG=/img/
PATH_SERIMG=/img/revistas/
PATH_SERIAL_HTML=/revistas/
PATH_XSL=/home/scielo/www/htdocs/xsl/
PATH_DATABASE=/home/scielo/www/bases/
PATH_SETTINGS=
PATH_PDF=/home/scielo/www/bases/pdf/
PATH_TRANSLATION=/home/scielo/www/bases/translation/
PATH_HTDOCS=/home/scielo/www/htdocs/

[LOG]
ACTIVATE_LOG=0
ENABLE_STATISTICS_LINK=1
ENABLE_CITATION_REPORTS_LINK=1
ENABLE_SERVICES_LOG=1
ENABLE_AUTH_USERS_LOG=1
AUTH_USERS_LOG_FILENAME=auth_users_log
SERVICES_LOG_DIRECTORY=/home/scielo/www/logs/services
SERVICES_LOG_ERROR_MAIL_ALERT=0
#SERVICES_LOG_ERROR_MAIL_ALERT=scielo@bireme.br
SERVER_LOG=scielo-log.bireme.br
SCRIPT_LOG_NAME=scielolog/updateLog02.php
SCRIPT_LOG_RUN=scielolog/scielolog03B2.php
ACTIVATE_GOOGLE=0
GOOGLE_CODE=UA-604844-1
PATH_LOG_CACHE=/home/scielo/www/bases/pages/sci_stat/
SCRIPT_TOP_TEN="http://scielo-log.bireme.br/scielolog/ofigraph20.php?app=scielo"
SCRIPT_ARTICLES_PER_MONTH="http://scielo-log.bireme.br/scielolog/ofigraph21.php?app=scielo"

[LOG_DATABASE_INFO]
DB_NAME = log
TABLE_NAME = scielo
TABLE_JOURNALS_NAME = journalstat
TABLE_ISSUES_NAME = statissue
TABLE_ARTICLES_NAME = statarticle
TABLE_ART_LANG_NAME = sci_artlangstat
TABLE_TITLE_NAME = biblio.title
TITLE_SOURCE = scielobr
ADMIN_EMAIL = mysqladmin@bireme.br

[CACHE]
ENABLED_CACHE=0
SERVER_CACHE=localhost
SERVER_PORT_CACHE=11211
MAX_DAYS = 1
MAX_SIZE = 9368709120 
PATH_CACHE=/home/scielo/www/bases/pages/
CACHE_STATUS = off

[SOCKET]
SOCK_PORT=8899
ACCESS_LOG_FILE=/home/scielo/www/bases/logs/socket_access_log.log
ENABLE_ACCESS_LOG=0

[SCIELO_REGIONAL]
SCIELO_REGIONAL_DOMAIN=teste.scielo.org
login_url=/applications/scielo-org/sso/loginScielo.php
logout_url=/applications/scielo-org/sso/logoutScielo.php
check_login_url=/applications/scielo-org/sso/checkLogin.php

[services]
show_toolbox=1
show_requests=1
show_login=1
show_datasus=1
show_send_by_email=1
show_cited_scielo=1
show_cited_google=1
show_similar_in_scielo=1
show_similar_in_google=1
google_last_process=20060901
show_article_references=1


[FULLTEXT_SERVICES]
access="http://vm.scielo.br/applications/scielo-org/pages/services/articleRequestGraphicPage.php?pid=PARAM_PID&caller=PARAM_SERVER"
cited_SciELO="http://vm.scielo.br/scieloOrg/php/citedScielo.php?pid=PARAM_PID"
cited_SciELO_service="http://trigramas.bireme.br/cgi-bin/mxlind/cgi=@cited?pid=PARAM_PID"
similar_SciELO_service="http://trigramas.bireme.br/cgi-bin/mx/cgi=@1?xml&collection=SciELO.org.TiKwAb&minsim=0.30&maxrel=30&show=scielo1&text=PARAM_TEXT"
cited_Google="http://scholar.google.com/scholar?q=link:CURRENT_URL"
related_Google="http://scholar.google.com/scholar?q=related:CURRENT_URL"
related="http://vm.scielo.br/scieloOrg/php/related.php?pid=PARAM_PID"
related_service="http://trigramas.bireme.br/cgi-bin/mxlind/cgi=@related?pid=PARAM_PID"
send_mail="http://vm.scielo.br/applications/scielo-org/pages/services/sendMail.php?pid=PARAM_PID&caller=PARAM_SERVER"

[mimetex]
mimetex=/cgi-bin/mimetex.exe

[XML_ERROR]
ENABLED_XML_ERROR=0
ENABLED_MAIL_ALERT=0
ENABLED_LOG_XML_ERROR=1
MAILTO_XML_ERROR=xxx@xxx.xxx
NAMETO_XML_ERROR=SciELO
LOG_XML_ERROR_FILENAME=/home/scielo/www/logs/xml_error_log.txt

[DIVULGACAO]
ENABLE_DIVULGACAO=0

[PRESENTATION]
BEFOREPRINT_ISSUES=splited
BEFOREPRINT_ISSUETOC=splited
xBEFOREPRINT_ISSUES=together
xBEFOREPRINT_ISSUETOC=together

[DATABASES]
DB_SCIELO=scieloorgusers
DB_BLOG=blog
DB_USER_SCIELO=fabio
DB_USER_BLOG=fabio
DB_USER_SCIELO_PASSWORD=batalha
DB_USER_BLOG_PASSWORD=batalha
DB_HOST_BLOG = 172.27.0.155
DB_HOST_SCIELO = 172.27.0.155