<?php
/*
Template Name: Custom Feed
*/
header('Content-Type: ' . feed_content_type('rss-http') . '; charset=' . get_option('blog_charset'), true);
$numposts = 5;

function yoast_rss_date( $timestamp = null ) {
    $timestamp = ($timestamp==null) ? time() : $timestamp;
    echo date(DATE_RSS, $timestamp);
}

function yoast_rss_text_limit($string, $length, $replacer = '...') {
    $string = strip_tags($string);
    if(strlen($string) > $length)
        return (preg_match('/^(.*)\W.*$/', substr($string, 0, $length+1), $matches) ? $matches[1] : substr($string, 0, $length)) . $replacer;
    return $string;
}

$posts = query_posts('showposts='.$numposts);

$lastpost = $numposts - 1;

echo '<?xml version="1.0"?>';?>
<rss version="2.0">
    <channel>
        <title>Yoast E-mail Update</title>
        <link>http://yoast.com/</link>
        <description>The latest blog posts from Yoast.com.</description>
        <language>en-us</language>
        <lastBuildDate><?php echo mysql2date('D, d M Y H:i:s +0000', get_lastpostmodified('GMT'), false); ?></lastBuildDate>
        <managingEditor>joost@yoast.com</managingEditor>
        <?php foreach ($posts as $post) { ?>
            <item>
                <title><?php echo get_the_title($post->ID); ?></title>
                <link><?php echo get_permalink($post->ID); ?></link>
                <description><?php echo '<![CDATA['.yoast_rss_text_limit($post->post_content, 500).'<br/><br/>Keep on reading: <a href="'.get_permalink($post->ID).'">'.get_the_title($post->ID).'</a>'.']]>';  ?></description>
                <pubDate><?php yoast_rss_date( strtotime($post->post_date_gmt) ); ?></pubDate>
                <guid><?php echo get_permalink($post->ID); ?></guid>
            </item>
        <?php } ?>
    </channel>
</rss>