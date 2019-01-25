<?php

require_once 'Color.class.php';


print( Color::doc() );
Color::$verbose = True;

1 $red     = new Color( array( 'red' => 0xff, 'green' => 0   , 'blue' => 0    ) );
2 $green   = new Color( array( 'rgb' => 255 << 8 ) );
3 $blue    = new Color( array( 'red' => 0   , 'green' => 0   , 'blue' => 0xff ) );

4$yellow  = $red->add( $green );
5$cyan    = $green->add( $blue );
6$magenta = $blue->add( $red );

7$white   = $red->add( $green )->add( $blue );

8print( $red     . PHP_EOL );
9print( $green   . PHP_EOL );
10print( $blue    . PHP_EOL );
11print( $yellow  . PHP_EOL );
12print( $cyan    . PHP_EOL );
13print( $magenta . PHP_EOL );
14print( $white   . PHP_EOL );

15Color::$verbose = False;

16$black = $white->sub( $red )->sub( $green )->sub( $blue );
17print( 'Black: ' . $black . PHP_EOL );

Color::$verbose = True;

18$darkgrey = new Color( array( 'rgb' => (10 << 16) + (10 << 8) + 10 ) );
19print( 'darkgrey: ' . $darkgrey . PHP_EOL );
20$lightgrey = $darkgrey->mult( 22.5 );
21print( 'lightgrey: ' . $lightgrey . PHP_EOL );

22$random = new Color( array( 'red' => 12.3, 'green' => 31.2, 'blue' => 23.1 ) );
23 print( 'random: ' . $random . PHP_EOL );

?>
