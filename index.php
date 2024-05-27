<?php

include 'inc/header.php';

// Start session if not already started
Session::init();
Session::CheckSession();

$logMsg = Session::get('logMsg');
if (isset($logMsg)) {
  echo $logMsg;
}
$msg = Session::get('msg');
if (isset($msg)) {
  echo $msg;
}
Session::set("msg", NULL);
Session::set("logMsg", NULL);

// Check if user is logged in
if (Session::get('login')) {
  // Retrieve user ID from session
  $userId = Session::get('id');
} else {
  // Handle the case when user is not logged in
  echo "User is not logged in.";
}

?>
<?php

if (isset($activeId)) {
  echo $activeId;
}
?>

<?php
// Establish database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "intern";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// SQL query to count the total number of questions with status 'solved'
$sql = "SELECT (JSON_LENGTH(Questions_solved)) AS total_solved 
        FROM tbl_users 
        WHERE id = '$userId'";

$result = $conn->query($sql);
$totalSolved = 0; // Initialize the total solved questions count

if ($result->num_rows > 0) {
  $row = $result->fetch_assoc();
  $totalSolved = $row['total_solved'];
} else {
  // Handle the case when no rows are returned
  echo "No rows found for the specified user ID.";
}

//Reasoning category progress
$sql_reasoning = "SELECT 
FLOOR((COUNT(rl.id_in_json) / total_reasoning_questions.total_count) * 100) AS reasoning_progress 
FROM 
(SELECT 
    COUNT(*) AS total_count 
 FROM 
    questions_list 
 WHERE 
    subtopicid IN (SELECT id FROM topics WHERE topic = 'Reasoning')
) AS total_reasoning_questions,
(
SELECT
    JSON_UNQUOTE(JSON_EXTRACT(Reasoning, CONCAT('$[', numbers.n, ']'))) AS id_in_json
FROM
    tbl_users
JOIN
    (SELECT 0 AS n UNION ALL SELECT 1 UNION ALL SELECT 2 UNION ALL SELECT 3 UNION ALL SELECT 4 UNION ALL SELECT 5 UNION ALL SELECT 6 UNION ALL SELECT 7 UNION ALL SELECT 8 UNION ALL SELECT 9) numbers
        ON CHAR_LENGTH(Reasoning)
            - CHAR_LENGTH(REPLACE(Reasoning, ',', '')) >= numbers.n
WHERE
    id = ?
) AS rl
WHERE 
JSON_CONTAINS((SELECT Reasoning FROM tbl_users WHERE id = ?), JSON_ARRAY(rl.id_in_json)) = 1;
";
$stmt = $conn->prepare($sql_reasoning);
$stmt->bind_param("ii", $userId, $userId); // Two "i" placeholders, so two variables are needed
$stmt->execute();
$result_reasoning = $stmt->get_result();

$reasoning_progress = 0; // Initialize the English progress

if ($result_reasoning->num_rows > 0) {
  $row_reasoning = $result_reasoning->fetch_assoc();
  $reasoning_progress = $row_reasoning['reasoning_progress'];
}

// English category progress
$sql_english = "SELECT 
FLOOR((COUNT(rl.id_in_json) / total_english_questions.total_count) * 100) AS english_progress 
FROM 
(SELECT 
    COUNT(*) AS total_count 
 FROM 
    questions_list 
 WHERE 
    subtopicid IN (SELECT id FROM topics WHERE topic = 'English')
) AS total_english_questions,
(
SELECT
    JSON_UNQUOTE(JSON_EXTRACT(English, CONCAT('$[', numbers.n, ']'))) AS id_in_json
FROM
    tbl_users
JOIN
    (SELECT 0 AS n UNION ALL SELECT 1 UNION ALL SELECT 2 UNION ALL SELECT 3 UNION ALL SELECT 4 UNION ALL SELECT 5 UNION ALL SELECT 6 UNION ALL SELECT 7 UNION ALL SELECT 8 UNION ALL SELECT 9) numbers
        ON CHAR_LENGTH(English)
            - CHAR_LENGTH(REPLACE(English, ',', '')) >= numbers.n
WHERE
    id = ?
) AS rl
WHERE 
JSON_CONTAINS((SELECT English FROM tbl_users WHERE id = ?), JSON_ARRAY(rl.id_in_json)) = 1;
";
$stmt = $conn->prepare($sql_english);
$stmt->bind_param("ii", $userId, $userId); // Two "i" placeholders, so two variables are needed
$stmt->execute();
$result_english = $stmt->get_result();

$english_progress = 0; // Initialize the English progress

if ($result_english->num_rows > 0) {
  $row_english = $result_english->fetch_assoc();
  $english_progress = $row_english['english_progress'];
}

// General Knowledge category progress
$sql_general = "SELECT 
FLOOR((COUNT(rl.id_in_json) / total_general_questions.total_count) * 100) AS general_progress 
FROM 
(SELECT 
    COUNT(*) AS total_count 
 FROM 
    questions_list 
 WHERE 
    subtopicid IN (SELECT id FROM topics WHERE topic = 'General Knowledge')
) AS total_general_questions,
(
SELECT
    JSON_UNQUOTE(JSON_EXTRACT(General, CONCAT('$[', numbers.n, ']'))) AS id_in_json
FROM
    tbl_users
JOIN
    (SELECT 0 AS n UNION ALL SELECT 1 UNION ALL SELECT 2 UNION ALL SELECT 3 UNION ALL SELECT 4 UNION ALL SELECT 5 UNION ALL SELECT 6 UNION ALL SELECT 7 UNION ALL SELECT 8 UNION ALL SELECT 9) numbers
        ON CHAR_LENGTH(General)
            - CHAR_LENGTH(REPLACE(General, ',', '')) >= numbers.n
WHERE
    id = ?
) AS rl
WHERE 
JSON_CONTAINS((SELECT General FROM tbl_users WHERE id = ?), JSON_ARRAY(rl.id_in_json)) = 1;
";
$stmt = $conn->prepare($sql_general);
$stmt->bind_param("ii", $userId, $userId); // Two "i" placeholders, so two variables are needed
$stmt->execute();
$result_general = $stmt->get_result();

$general_progress = 0; // Initialize the English progress

if ($result_general->num_rows > 0) {
  $row_general = $result_general->fetch_assoc();
  $general_progress = $row_general['general_progress'];
}

// Aptitude category progress
$sql_aptitude = "SELECT 
FLOOR((COUNT(rl.id_in_json) / total_aptitude_questions.total_count) * 100) AS aptitude_progress 
FROM 
(SELECT 
    COUNT(*) AS total_count 
 FROM 
    questions_list 
 WHERE 
    subtopicid IN (SELECT id FROM topics WHERE topic = 'Aptitude')
) AS total_aptitude_questions,
(
SELECT
    JSON_UNQUOTE(JSON_EXTRACT(Aptitude, CONCAT('$[', numbers.n, ']'))) AS id_in_json
FROM
    tbl_users
JOIN
    (SELECT 0 AS n UNION ALL SELECT 1 UNION ALL SELECT 2 UNION ALL SELECT 3 UNION ALL SELECT 4 UNION ALL SELECT 5 UNION ALL SELECT 6 UNION ALL SELECT 7 UNION ALL SELECT 8 UNION ALL SELECT 9) numbers
        ON CHAR_LENGTH(Aptitude)
            - CHAR_LENGTH(REPLACE(Aptitude, ',', '')) >= numbers.n
WHERE
    id = ?
) AS rl
WHERE 
JSON_CONTAINS((SELECT Aptitude FROM tbl_users WHERE id = ?), JSON_ARRAY(rl.id_in_json)) = 1;
";
$stmt = $conn->prepare($sql_aptitude);
$stmt->bind_param("ii", $userId, $userId); // Two "i" placeholders, so two variables are needed
$stmt->execute();
$result_aptitude = $stmt->get_result();

$aptitude_progress = 0; // Initialize the English progress

if ($result_aptitude->num_rows > 0) {
  $row_aptitude = $result_aptitude->fetch_assoc();
  $aptitude_progress = $row_aptitude['aptitude_progress'];
}

// Logical category progress
$sql_logical = "SELECT 
FLOOR((COUNT(rl.id_in_json) / total_logical_questions.total_count) * 100) AS logical_progress 
FROM 
(SELECT 
    COUNT(*) AS total_count 
 FROM 
    questions_list 
 WHERE 
    subtopicid IN (SELECT id FROM topics WHERE topic = 'Logical')
) AS total_logical_questions,
(
SELECT
    JSON_UNQUOTE(JSON_EXTRACT(Logical, CONCAT('$[', numbers.n, ']'))) AS id_in_json
FROM
    tbl_users
JOIN
    (SELECT 0 AS n UNION ALL SELECT 1 UNION ALL SELECT 2 UNION ALL SELECT 3 UNION ALL SELECT 4 UNION ALL SELECT 5 UNION ALL SELECT 6 UNION ALL SELECT 7 UNION ALL SELECT 8 UNION ALL SELECT 9) numbers
        ON CHAR_LENGTH(Logical)
            - CHAR_LENGTH(REPLACE(Logical, ',', '')) >= numbers.n
WHERE
    id = ?
) AS rl
WHERE 
JSON_CONTAINS((SELECT Logical FROM tbl_users WHERE id = ?), JSON_ARRAY(rl.id_in_json)) = 1;
";
$stmt = $conn->prepare($sql_logical);
$stmt->bind_param("ii", $userId, $userId); // Two "i" placeholders, so two variables are needed
$stmt->execute();
$result_logical = $stmt->get_result();

$logical_progress = 0; // Initialize the English progress

if ($result_logical->num_rows > 0) {
  $row_logical = $result_logical->fetch_assoc();
  $logical_progress = $row_logical['logical_progress'];
}

$conn->close();
?>

<style>
  /* Only the scroll bar */
  ::-webkit-scrollbar {
    width: .5rem;
    height: .5rem;
  }

  ::-webkit-scrollbar-thumb {
    background: rgba(0, 0, 0, .15);
  }

  ::-webkit-scrollbar-thumb:hover {
    background: rgba(0, 0, 0, .3);
  }

  .content {
    margin-top: 5rem;
  }
</style>

<body class=" content relative bg-yellow-50 overflow-hidden max-h-screen">


  <aside class="fixed inset-y-0 left-0 bg-white shadow-md max-h-screen w-64 hidden lg:block">
    <div class="flex flex-col justify-between h-full">
      <div class="flex-grow overflow-y-scroll">
        <div class="px-4 py-6 text-center border-b">
          <h1 class="text-2xl font-bold leading-none text-yellow-600"><span class="text-gray-700">REGAL</span>&nbsp;Gold</h1>
        </div>
        <div class="p-4">
          <ul class="space-y-1">
            <li>
              <a href="javascript:void(0)" class="flex items-center bg-yellow-200 rounded-xl font-bold text-lg text-yellow-900 py-3 px-4">
                <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" class="text-lg mr-4" viewBox="0 0 16 16">
                  <path d="M9.828 3h3.982a2 2 0 0 1 1.992 2.181l-.637 7A2 2 0 0 1 13.174 14H2.825a2 2 0 0 1-1.991-1.819l-.637-7a1.99 1.99 0 0 1 .342-1.31L.5 3a2 2 0 0 1 2-2h3.672a2 2 0 0 1 1.414.586l.828.828A2 2 0 0 0 9.828 3zm-8.322.12C1.72 3.042 1.95 3 2.19 3h5.396l-.707-.707A1 1 0 0 0 6.172 2H2.5a1 1 0 0 0-1 .981l.006.139z" />
                </svg>Categories
              </a>
            </li>
            <li>
              <a href="javascript:void(0)" onclick="location.href='Practice.php?userId=<?php echo $userId; ?>'" class="flex items-center bg-white hover:bg-yellow-50 rounded-xl font-bold text-lg text-gray-900 py-3 px-4">
                <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" class="text-lg mr-4" viewBox="0 0 16 16">
                  <path d="M12 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2zM5 4h6a.5.5 0 0 1 0 1H5a.5.5 0 0 1 0-1zm-.5 2.5A.5.5 0 0 1 5 6h6a.5.5 0 0 1 0 1H5a.5.5 0 0 1-.5-.5zM5 8h6a.5.5 0 0 1 0 1H5a.5.5 0 0 1 0-1zm0 2h3a.5.5 0 0 1 0 1H5a.5.5 0 0 1 0-1z" />
                </svg>Practice
              </a>
            </li>
            <br>
            <h3 class="text-md font-semibold ml-2">Advertisement</h3>
            <img onclick="window.open('https://www.embibe.com/');" class="rounded-xl" src="https://d2cyt36b7wnvt9.cloudfront.net/exams/wp-content/uploads/2022/07/06233726/Mobile-Banner-Copies-JEE-Ad-test-1-UG-2.gif" alt="www.embibe.com">
          </ul>
        </div>
      </div>
    </div>
  </aside>

  <main class="lg:ml-60 max-h-screen overflow-auto ">
    <div class=" lg:px-6 px-0 md:px-2 py-8">
      <div class="max-w-4/5 mx-auto">
        <div class="bg-white rounded-3xl p-8 mb-5 backdrop-blur-sm" style="margin-top: 3rem;">
          <div class="flex items-center justify-between">
            <div class="flex items-stretch ">
              <div class="text-gray-400 text-xs">Questions<br>Practiced</div>
              <div class="h-100 border-l mx-2"></div>
              <div class="flex flex-nowrap -space-x-3">
                <h1 style="font-weight:bold; font-size:1.5rem !important;"><?php echo $totalSolved; ?></h1>
              </div>
              &emsp;
            </div>
          </div>

          <hr class="my-6">

          <div class=" lg:grid sm:flex flex flex-col grid-cols-2 gap-x-5">
            <div>
              <h2 class="text-2xl font-bold mb-4">Categories</h2>

              <div class="grid grid-cols-2 gap-4">
                <div class="col-span-2 flex">
                  <button type="button" class="inline-flex relative items-center w-16 text-sm font-medium text-center text-black border-2 rounded-xl border-blue-100">
                    <span class="text-2xl font-bold text-blue-300 m-auto">R</span>
                  </button>&nbsp;
                  <div class="p-4 bg-blue-100 rounded-xl flex justify-between items-center w-full">
                    <div class="font-bold text-2xl text-gray-800 leading-none">Reasoning</div>
                    <div class="">
                      <button type="button" class="inline-flex items-center justify-center py-2 px-3 rounded-xl bg-white text-gray-800 hover:text-green-500 text-sm font-semibold transition" onclick="window.open('Categories/Reasoning.php?userId=<?php echo $userId; ?>')" target="_blank">
                        Start Practicing
                      </button>
                    </div>
                  </div>
                </div>
                <div class="col-span-2 flex">
                  <button type="button" class="inline-flex relative items-center w-16 text-sm font-medium text-center text-black border-2 rounded-xl border-red-100">
                    <span class="text-2xl font-bold text-red-300 m-auto">E</span>
                  </button>&nbsp;
                  <div class="p-4 bg-red-100 rounded-xl flex justify-between items-center w-full">
                    <div class="font-bold text-2xl text-gray-800 leading-none">English</div>
                    <div class="">
                      <button type="button" class="inline-flex items-center justify-center py-2 px-3 rounded-xl bg-white text-gray-800 hover:text-green-500 text-sm font-semibold transition" onclick="window.open('Categories/English.php?userId=<?php echo $userId; ?>')">
                        Start Practicing
                      </button>
                    </div>
                  </div>
                </div>
                <div class="col-span-2 flex">
                  <button type="button" class="inline-flex relative items-center w-16 text-sm font-medium text-center text-black border-2 rounded-xl border-green-100">
                    <span class="text-2xl font-bold text-green-300 m-auto">G</span>
                  </button>&nbsp;
                  <div class="p-4 bg-green-100 rounded-xl flex justify-between items-center w-full">
                    <div class="font-bold text-2xl text-gray-800 leading-none">General Knowledge</div>
                    <div class="">
                      <button type="button" class="inline-flex items-center justify-center py-2 px-3 rounded-xl bg-white text-gray-800 hover:text-green-500 text-sm font-semibold transition" onclick="window.open('Categories/General.php?userId=<?php echo $userId; ?>')">
                        Start Practicing
                      </button>
                    </div>
                  </div>
                </div>
                <div class="col-span-2 flex">
                  <button type="button" class="inline-flex relative items-center w-16 text-sm font-medium text-center text-black border-2 rounded-xl border-violet-100">
                    <span class="text-2xl font-bold text-violet-300 m-auto">A</span>
                  </button>&nbsp;
                  <div class="p-4 bg-violet-100 rounded-xl flex justify-between items-center w-full">
                    <div class="font-bold text-2xl text-gray-800 leading-none">Aptitude</div>
                    <div class="">
                      <button type="button" class="inline-flex items-center justify-center py-2 px-3 rounded-xl bg-white text-gray-800 hover:text-green-500 text-sm font-semibold transition" onclick="window.open('Categories/Aptitude.php?userId=<?php echo $userId; ?>')">
                        Start Practicing
                      </button>
                    </div>
                  </div>
                </div>
                <div class="col-span-2 flex">
                  <button type="button" class="inline-flex relative items-center w-16 text-sm font-medium text-center text-black border-2 rounded-xl border-yellow-100">
                    <span class="text-2xl font-bold text-yellow-300 m-auto">L</span>
                  </button>&nbsp;
                  <div class="p-4 bg-yellow-100 rounded-xl flex justify-between items-center w-full">
                    <div class="font-bold text-2xl text-gray-800 leading-none">Logical</div>
                    <div class="">
                      <button type="button" class="inline-flex items-center justify-center py-2 px-3 rounded-xl bg-white text-gray-800 hover:text-green-500 text-sm font-semibold transition" onclick="window.open('Categories/Logical.php?userId=<?php echo $userId; ?>')">
                        Start Practicing
                      </button>
                    </div>
                  </div>
                </div>




              </div>
            </div>
            <div class="text-2xl font-bold mb-4">
              <h2>Your Progress<br></h2>

              <div class="p-4 bg-white border rounded-xl text-gray-800 mb-3 space-y-2" style="margin-top: 2rem;">
                <div class="progress progress1" style="background: #d5ecff;">
                  <div class="progress__fill1" style="background: #88c9fe;"></div>
                </div>
                <style>
                  .progress__fill1 {
                    width: <?php echo $reasoning_progress; ?>%
                  }
                </style>
              </div>
              <div class="p-4 bg-white border rounded-xl text-gray-800 mb-3 space-y-2" style="margin-top: 2rem;">
                <div class="progress progress2" style="background: #faced7;">
                  <div class="progress__fill2" style="background: #f14668;"></div>
                  <style>
                    .progress__fill2 {
                      width: <?php echo $english_progress; ?>%
                    }
                  </style>
                </div>
              </div>
              <div class="p-4 bg-white border rounded-xl text-gray-800 mb-3 space-y-2" style="margin-top: 2rem;">
                <div class="progress progress3" style="background: #bbfdd3;">
                  <div class="progress__fill3" style="background: #29fc77;"></div>
                  <style>
                    .progress__fill3 {
                      width: <?php echo $general_progress; ?>%
                    }
                  </style>
                </div>
              </div>
              <div class="p-4 bg-white border rounded-xl text-gray-800 mb-3 space-y-2" style="margin-top: 2rem;">
                <div class="progress progress4" style="background: #ca92e4">
                  <div class="progress__fill4" style="background: #a418e4;"></div>
                  <!-- <div class="progress__text3">10%</div> -->
                  <style>
                    .progress__fill4 {
                      width: <?php echo $aptitude_progress; ?>%
                    }
                  </style>
                </div>
              </div>
              <div class="p-4 bg-white border rounded-xl text-gray-800 mb-3 space-y-2" style="margin-top: 2rem;">
                <div class="progress progress5" style="background: #f8f9d7;">
                  <div class="progress__fill5" style="background: #eff312;"></div>
                  <!-- <div class="progress__text4">0%</div> -->
                  <style>
                    .progress__fill5 {
                      width: <?php echo $logical_progress; ?>%
                    }
                  </style>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </main>



</body>

<?php
include 'inc/footer.php';
?>