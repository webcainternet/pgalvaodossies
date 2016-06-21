<?php
/**
 * As configurações básicas do WordPress.
 *
 * Esse arquivo contém as seguintes configurações: configurações de MySQL, Prefixo de Tabelas,
 * Chaves secretas, Idioma do WordPress, e ABSPATH. Você pode encontrar mais informações
 * visitando {@link http://codex.wordpress.org/Editing_wp-config.php Editing
 * wp-config.php} Codex page. Você pode obter as configurações de MySQL de seu servidor de hospedagem.
 *
 * Esse arquivo é usado pelo script ed criação wp-config.php durante a
 * instalação. Você não precisa usar o site, você pode apenas salvar esse arquivo
 * como "wp-config.php" e preencher os valores.
 *
 * @package WordPress
 */

// ** Configurações do MySQL - Você pode pegar essas informações com o serviço de hospedagem ** //
/** O nome do banco de dados do WordPress */
define('DB_NAME', 'comeati_dossies');

/** Usuário do banco de dados MySQL */
define('DB_USER', 'comeati_dossies');

/** Senha do banco de dados MySQL */
define('DB_PASSWORD', 'j3refyd63f');

/** nome do host do MySQL */
define('DB_HOST', 'localhost');

/** Conjunto de caracteres do banco de dados a ser usado na criação das tabelas. */
define('DB_CHARSET', 'utf8');

/** O tipo de collate do banco de dados. Não altere isso se tiver dúvidas. */
define('DB_COLLATE', '');

/**#@+
 * Chaves únicas de autenticação e salts.
 *
 * Altere cada chave para um frase única!
 * Você pode gerá-las usando o {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * Você pode alterá-las a qualquer momento para desvalidar quaisquer cookies existentes. Isto irá forçar todos os usuários a fazerem login novamente.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'T;/!&M!ITjF1b7%Jf)%!C|SfFinIDhr-Wkp?ZvuPy%9iM_po|kUFm!|[FFw;AN$+');
define('SECURE_AUTH_KEY',  'UgB&~Kc-[[vYk1o(cO:c-j9[s/GTs6U|rr,Ps>9Jw`9kM<.H |A;s_s4]5UTBGP=');
define('LOGGED_IN_KEY',    'mHpDmqakv-7^a_#[If&R/`fC=[rFq=+o+n#9Hoz)H.vG{4TQlzlg=Z4Q/[GLwTg4');
define('NONCE_KEY',        'VNm]ecyXYHsg)7=mWO?@~^YuDa5a3GD!alQ}vp`B;)<#Hy5I?F`6{1B!n<DIXs+0');
define('AUTH_SALT',        'boZwc[:B_}D^FF% OwOo&R|L}}^9aw&o6: d?%u~02;c!NtHRAWS/-MnS_HOg5&a');
define('SECURE_AUTH_SALT', 'S;Pe:oU@CMsL79yX]B^L$tz{F&_+_-7@p-)@7&(/XX9&A|w(yHQFsGNfGcI[/lor');
define('LOGGED_IN_SALT',   '=g?WCWpwR{Xa.+-50s?-W++yMNeh&iVK7vNy !LN1<aL!}9:l{Ryb1HV}UKyH_ce');
define('NONCE_SALT',       'Vy,#x[[TyT/el-Q pmV`d|A[2+2!JiriOC-M|6zd8:5A[lqSyjkq &AgZFYL&&JC');

/**#@-*/

/**
 * Prefixo da tabela do banco de dados do WordPress.
 *
 * Você pode ter várias instalações em um único banco de dados se você der para cada um um único
 * prefixo. Somente números, letras e sublinhados!
 */
$table_prefix  = 'wp_';


/**
 * Para desenvolvedores: Modo debugging WordPress.
 *
 * altere isto para true para ativar a exibição de avisos durante o desenvolvimento.
 * é altamente recomendável que os desenvolvedores de plugins e temas usem o WP_DEBUG
 * em seus ambientes de desenvolvimento.
 */
define('WP_DEBUG', false);
define( 'WP_ALLOW_MULTISITE', true );
define('MULTISITE', true);
define('SUBDOMAIN_INSTALL', false);
define('DOMAIN_CURRENT_SITE', 'www.agenciapatriciagalvao.org.br');
define('PATH_CURRENT_SITE', '/dossies/');
define('SITE_ID_CURRENT_SITE', 1);
define('BLOG_ID_CURRENT_SITE', 1);

/* Isto é tudo, pode parar de editar! :) */

/** Caminho absoluto para o diretório WordPress. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Configura as variáveis do WordPress e arquivos inclusos. */
require_once(ABSPATH . 'wp-settings.php');
