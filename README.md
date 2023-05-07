# bricklinkApi
Bricklink API Package


$BricklinkApi = new /Rmfloris\BricklinkApi([
  'tokenValue' => {TOKEN},
  'tokenSecret' => {TOKEN_SECRET},
  'consumerKey' => {CONSUMER_KEY},
  'consumerSecret' => {CONSUMER_SECRET}
]);

$response = $BricklinkApi->request({HTTP_METHOD}, {API_PATH}, {PARAMS})
              ->execute();