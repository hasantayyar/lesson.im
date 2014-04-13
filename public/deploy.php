<?php
	/**
	 * GIT DEPLOYMENT SCRIPT
	 *
	 * Used for automatically deploying websites via github or bitbucket, more deets here:
	 *
	 * forked from https://gist.github.com/1809044
	 */
 
	// The commands
	$commands = array(
		'echo $PWD',
		'whoami',
		'git pull origin master',
		'git status',
		'git submodule sync',
		'git submodule update',
		'git submodule status',
	);
        if(isset($_GET['db'])){
            $commands[]='mysql -uroot -proot dergipark < '.__DIR__.'/../db/dergipark.sql';
        }
        if(isset($_GET['composer'])){
            #chdir(__DIR__.'../');
            $commands[]='cd ../ && php composer.phar update';
        }
            $plain = isset($_GET['plain']) || !isset($_SERVER['HTTP_COOKIE']); // this may be commandline crequest
	// Run the commands for output
	$output = '';
	foreach($commands AS $command){
		// Run it
		$tmp = shell_exec($command);
                // Output
                if($plain){
                    $output.="\$ {$command}\n";
                }else{
		    $output .= "<span style=\"color: #6BE234;\">\$</span> <span style=\"color: #729FCF;\">{$command}\n</span>";
                }
                $output .= htmlentities(trim($tmp)) . "\n";
	}
 
	// Make it pretty for manual user access (and why not?)
?>
 
<?php
if(!$plain){
?>
<!DOCTYPE HTML>
<html lang="en-US">
<head>
	<meta charset="UTF-8">
	<title>GIT DEPLOYMENT SCRIPT</title>
</head>
<body style="background-color: #000000; color: #FFFFFF; font-weight: bold; padding: 0 10px;">
<pre>
 .  ____  .    ____________________________
 |/      \|   |                            |
[| <span style="color: #FF0000;">&hearts;    &hearts;</span> |]  | Git Deployment Script v0.1 |
 |___==___|  /              &copy; oodavid 2012 |
              |____________________________|
 
<?php
}
echo $output;
if(!$plain){
?>
</pre>
</body>
</html>
<?php }
