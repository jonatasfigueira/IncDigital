<?php
/**
 * As configurações básicas do WordPress
 *
 * O script de criação wp-config.php usa esse arquivo durante a instalação.
 * Você não precisa usar o site, você pode copiar este arquivo
 * para "wp-config.php" e preencher os valores.
 *
 * Este arquivo contém as seguintes configurações:
 *
 * * Configurações do MySQL
 * * Chaves secretas
 * * Prefixo do banco de dados
 * * ABSPATH
 *
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Configurações do MySQL - Você pode pegar estas informações com o serviço de hospedagem ** //
/** O nome do banco de dados do WordPress */
define( 'DB_NAME', 'incdigitalteste' );

/** Usuário do banco de dados MySQL */
define( 'DB_USER', 'root' );

/** Senha do banco de dados MySQL */
define( 'DB_PASSWORD', '' );

/** Nome do host do MySQL */
define( 'DB_HOST', 'localhost' );

/** Charset do banco de dados a ser usado na criação das tabelas. */
define( 'DB_CHARSET', 'utf8' );

/** O tipo de Collate do banco de dados. Não altere isso se tiver dúvidas. */
define( 'DB_COLLATE', '' );

/**#@+
 * Chaves únicas de autenticação e salts.
 *
 * Altere cada chave para um frase única!
 * Você pode gerá-las
 * usando o {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org
 * secret-key service}
 * Você pode alterá-las a qualquer momento para invalidar quaisquer
 * cookies existentes. Isto irá forçar todos os
 * usuários a fazerem login novamente.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         '%|M!.zW+RyU[zB+CGmqzhXN] k>_ahW?1h/;ir^y%|~mt78#]&[2 {g`(Uw,-9}I');
define('SECURE_AUTH_KEY',  'A<e|NQDf9s@+7`x;d|OhO;#_$Txl|B&b>.++#7r@E-Y@)eACth*%a<X-UXXSt$>-');
define('LOGGED_IN_KEY',    'J0iaI2cG;4iMUm[~US0&2L<~Txv&M^Cd-}at.5=fw<ycZa*BZR<Bnx.q}ljP&(]#');
define('NONCE_KEY',        ']3q7-;%?M.jM{p%V@Q8E|B4#D7I1?B)ZJG9#`O-24TT5LAp(0xrZ2vgGx||RouDt');
define('AUTH_SALT',        '25U96.Bz|@td7)-9^2k)-w^ hu+|APlcI,?+J$%>|uWTc--dgy+=v~sRV{j#dWL4');
define('SECURE_AUTH_SALT', ')&0o}A^|.$Eeo8Ta/rcI~^ELb1Y|v}9K:^X4GER7EG/p{]|r.rM+G(VM-JW+OGUE');
define('LOGGED_IN_SALT',   'b]+ZV8ho^T|3%t$5I{U# 1zJSJQ]dIR^Nt8d,{W%Pj0}_]]}+qi2lQ2C Y*kuMqh');
define('NONCE_SALT',       'eU?hCS;#qgXuGOO@G_9C(C]-9``q-~-w?pCbuHak34]@l=#$90e73hN<Fdpd=uHB');

/**#@-*/

/**
 * Prefixo da tabela do banco de dados do WordPress.
 *
 * Você pode ter várias instalações em um único banco de dados se você der
 * um prefixo único para cada um. Somente números, letras e sublinhados!
 */
$table_prefix = 'fsjf_';

/**
 * Para desenvolvedores: Modo de debug do WordPress.
 *
 * Altere isto para true para ativar a exibição de avisos
 * durante o desenvolvimento. É altamente recomendável que os
 * desenvolvedores de plugins e temas usem o WP_DEBUG
 * em seus ambientes de desenvolvimento.
 *
 * Para informações sobre outras constantes que podem ser utilizadas
 * para depuração, visite o Codex.
 *
 * @link https://wordpress.org/support/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', false );

/* Isto é tudo, pode parar de editar! :) */

/** Caminho absoluto para o diretório WordPress. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Configura as variáveis e arquivos do WordPress. */
require_once ABSPATH . 'wp-settings.php';
