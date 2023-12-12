<?php

$myString ="Praesent id finibus nisi. Ut eu porttitor diam, ut vestibulum tortor. Donec interdum a libero eget blandit. Pellentesque consectetur aliquet fringilla. Nulla facilisi. Maecenas vehicula eget elit eget tempus. Pellentesque lectus dolor, maximus eu leo et, imperdiet vehicula dolor. Cras eros tellus, viverra id odio non, elementum sollicitudin nulla. Morbi euismod, eros vitae porta venenatis, elit ipsum dictum elit, ac aliquet diam enim non lacus. Praesent id purus orci. Ut tortor nunc, porta ut ligula vitae, egestas laoreet felis. Quisque quis elit sit amet sapien sollicitudin posuere cursus sit amet sem. Suspendisse sollicitudin, mauris a vestibulum mattis, nisl lacus ullamcorper erat, at fermentum justo ligula vitae dui. Aliquam placerat arcu lectus, convallis consectetur eros tincidunt at. Aenean interdum vehicula dapibus. Nulla turpis odio, feugiat quis ultricies pellentesque, maximus eget risus.

Mauris viverra bibendum nisl ac malesuada. Pellentesque accumsan massa at lectus consequat, id auctor diam pellentesque. Vivamus congue nec ante non consequat. Morbi at velit quis est consectetur placerat. Duis ac purus est. Donec eget sapien velit. Praesent at tempor nulla, eu placerat nunc. In consectetur leo sit amet tortor ultricies, in eleifend tellus auctor. Etiam quis urna pulvinar, auctor elit eget, scelerisque nisi.

Aenean turpis erat, elementum venenatis libero vitae, accumsan vehicula justo. Donec elementum ultrices magna, sed porttitor tellus convallis quis. Donec cursus eros sit amet felis volutpat, vel vestibulum purus aliquam. Fusce mattis consectetur nulla, quis tincidunt nisl venenatis nec. Fusce id tincidunt lacus. Nunc ultricies consequat ante id laoreet. Mauris varius luctus diam non varius. Duis placerat aliquet mollis. Nullam at sapien nec orci fringilla dictum ut sed ipsum. In eu nisi pulvinar neque euismod blandit non ac dui. Proin scelerisque, odio vel mollis egestas, tellus tortor porttitor enim, eget tincidunt sapien quam sed ligula. Nam eu lectus vel nisi lacinia blandit eget eget enim. Phasellus a augue tempus, dictum orci nec, convallis lorem. Ut tincidunt dapibus felis nec cursus.

Donec fermentum mollis nisi, sodales dapibus velit. Vivamus cursus erat interdum nisl gravida convallis sed eu orci. Donec vel ex fringilla, iaculis sem at, tincidunt sapien. Vivamus nibh odio, dapibus in ornare a, feugiat vitae massa. Maecenas ullamcorper consequat nunc a semper. Etiam maximus, lacus eu ornare mattis, ligula erat gravida urna, eget convallis urna orci sit amet magna. Duis bibendum dolor a eros sagittis, eget iaculis metus suscipit.

Sed ante tellus, imperdiet eu bibendum vel, facilisis in orci. Sed turpis erat, auctor volutpat velit non, accumsan accumsan enim. Nam ultricies finibus mi, ut facilisis diam cursus at. Suspendisse et augue nec augue vulputate eleifend quis id lectus. Nunc eu eros est. Nullam nec felis et nibh rhoncus ultricies. Duis sed faucibus sapien. Sed mi dolor, tempor in suscipit nec, tristique et enim. Donec vitae molestie felis. Phasellus lobortis auctor risus, sit amet eleifend lectus consectetur ac. Duis nec nunc tortor. Etiam interdum ipsum neque, id bibendum eros commodo tempor. Proin eget justo nec ipsum bibendum mollis in in velit. Fusce ac ligula vitae tellus ultrices facilisis. Sed massa nunc, cursus eget dignissim quis, ornare vitae.";

$paragraphs = explode("\n\n", $myString);
$paragraph_count = count($paragraphs);

// Count words
$words = explode(" ", $myString);
$word_count = count($words);

// Count letters
$letters = str_split($myString);
$letter_count = count($letters);

echo "You have {$paragraph_count} paragraphs, {$word_count} words, and {$letter_count} letters.";

echo strtolower($myString);
echo strtoupper($myString);

echo str_ireplace("diam", "BANANAAAA", $myString) . "\n";

echo "Today is " . date("l") . "\n";
echo "Today is " . date("l \\t\h\\e jS") . "\n";
echo "Today is " . date("M l, Y, g:i a") . "\n";
echo "Today is " . date("m.d.Y") . "\n";
echo "Today is " . date("D M j G:i:s e Y") . "\n";
echo "Today is " . date("Y-m-d G:i:s") . "\n";