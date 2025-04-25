<?php
include 'inc/header.php';

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
$sql = "SELECT COUNT(*) AS total_solved FROM questions_list WHERE status = 'solved'";
$result = $conn->query($sql);

$totalSolved = 0; // Initialize the total solved questions count

if ($result->num_rows > 0) {
  $row = $result->fetch_assoc();
  $totalSolved = $row['total_solved'];
}

// Reasoning category progress
$sql_reasoning = "SELECT FLOOR((COUNT(*) / (SELECT COUNT(*) FROM questions_list WHERE subtopicid IN (SELECT id FROM topics WHERE topic = 'Reasoning'))) * 100) AS reasoning_progress FROM questions_list WHERE status = 'solved' AND subtopicid IN (SELECT id FROM topics WHERE topic = 'Reasoning')";
$result_reasoning = $conn->query($sql_reasoning);

$reasoning_progress = 0; // Initialize the reasoning progress

if ($result_reasoning->num_rows > 0) {
  $row_reasoning = $result_reasoning->fetch_assoc();
  $reasoning_progress = $row_reasoning['reasoning_progress'];
}

// English category progress
$sql_english = "SELECT FLOOR((COUNT(*) / (SELECT COUNT(*) FROM questions_list WHERE subtopicid IN (SELECT id FROM topics WHERE topic = 'English'))) * 100) AS english_progress FROM questions_list WHERE status = 'solved' AND subtopicid IN (SELECT id FROM topics WHERE topic = 'English')";
$result_english = $conn->query($sql_english);

$english_progress = 0; // Initialize the English progress

if ($result_english->num_rows > 0) {
  $row_english = $result_english->fetch_assoc();
  $english_progress = $row_english['english_progress'];
}

// General Knowledge category progress
$sql_general = "SELECT FLOOR((COUNT(*) / (SELECT COUNT(*) FROM questions_list WHERE subtopicid IN (SELECT id FROM topics WHERE topic = 'General Knowledge'))) * 100) AS general_progress FROM questions_list WHERE status = 'solved' AND subtopicid IN (SELECT id FROM topics WHERE topic = 'General Knowledge')";
$result_general = $conn->query($sql_general);

$general_progress = 0; // Initialize the general progress

if ($result_general->num_rows > 0) {
  $row_general = $result_general->fetch_assoc();
  $general_progress = $row_general['general_progress'];
}

// Aptitude category progress
$sql_aptitude = "SELECT FLOOR((COUNT(*) / (SELECT COUNT(*) FROM questions_list WHERE subtopicid IN (SELECT id FROM topics WHERE topic = 'Aptitude'))) * 100) AS aptitude_progress FROM questions_list WHERE status = 'solved' AND subtopicid IN (SELECT id FROM topics WHERE topic = 'Aptitude')";
$result_aptitude = $conn->query($sql_aptitude);

$aptitude_progress = 0; // Initialize the aptitude progress

if ($result_aptitude->num_rows > 0) {
  $row_aptitude = $result_aptitude->fetch_assoc();
  $aptitude_progress = $row_aptitude['aptitude_progress'];
}

// Logical category progress
$sql_logical = "SELECT FLOOR((COUNT(*) / (SELECT COUNT(*) FROM questions_list WHERE subtopicid IN (SELECT id FROM topics WHERE topic = 'Logical'))) * 100) AS logical_progress FROM questions_list WHERE status = 'solved' AND subtopicid IN (SELECT id FROM topics WHERE topic = 'Logical')";
$result_logical = $conn->query($sql_logical);

$logical_progress = 0; // Initialize the logical progress

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
              <a href="javascript:void(0)" onclick="location.href='Practice.php'" class="flex items-center bg-white hover:bg-yellow-50 rounded-xl font-bold text-lg text-gray-900 py-3 px-4">
                <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" class="text-lg mr-4" viewBox="0 0 16 16">
                  <path d="M12 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2zM5 4h6a.5.5 0 0 1 0 1H5a.5.5 0 0 1 0-1zm-.5 2.5A.5.5 0 0 1 5 6h6a.5.5 0 0 1 0 1H5a.5.5 0 0 1-.5-.5zM5 8h6a.5.5 0 0 1 0 1H5a.5.5 0 0 1 0-1zm0 2h3a.5.5 0 0 1 0 1H5a.5.5 0 0 1 0-1z" />
                </svg>Practice
              </a>
            </li>
            <br>
            <h3 class="text-md font-semibold ml-2">Advertisement</h3>
            <img onclick="window.open('https://www.embibe.com/');" class="rounded-xl" src="https://d2cyt36b7wnvt9.cloudfront.net/exams/wp-content/uploads/2022/07/06233726/Mobile-Banner-Copies-JEE-Ad-test-1-UG-2.gif" alt="www.embibe.com">

            <!-- <li>
              <a href="javascript:void(0)" class="flex bg-white hover:bg-yellow-50 rounded-xl font-bold text-sm text-gray-900 py-3 px-4">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="text-lg mr-4" viewBox="0 0 16 16">
                  <path d="M2 1a1 1 0 0 0-1 1v4.586a1 1 0 0 0 .293.707l7 7a1 1 0 0 0 1.414 0l4.586-4.586a1 1 0 0 0 0-1.414l-7-7A1 1 0 0 0 6.586 1H2zm4 3.5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0z"/>
                </svg>Profile
              </a>
            </li> -->
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
                      <button type="button" class="inline-flex items-center justify-center py-2 px-3 rounded-xl bg-white text-gray-800 hover:text-green-500 text-sm font-semibold transition" onclick="window.open('Categories/Reasoning.php')" target="_blank">
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
                      <button type="button" class="inline-flex items-center justify-center py-2 px-3 rounded-xl bg-white text-gray-800 hover:text-green-500 text-sm font-semibold transition" onclick="window.open('Categories/English.php')">
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
                      <button type="button" class="inline-flex items-center justify-center py-2 px-3 rounded-xl bg-white text-gray-800 hover:text-green-500 text-sm font-semibold transition" onclick="window.open('Categories/General.php')">
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
                      <button type="button" class="inline-flex items-center justify-center py-2 px-3 rounded-xl bg-white text-gray-800 hover:text-green-500 text-sm font-semibold transition" onclick="window.open('Categories/Aptitude.php')">
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
                      <button type="button" class="inline-flex items-center justify-center py-2 px-3 rounded-xl bg-white text-gray-800 hover:text-green-500 text-sm font-semibold transition" onclick="window.open('Categories/Logical.php')">
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
                    width:  <?php echo $reasoning_progress; ?>%
                  }
                </style>
              </div>
              <div class="p-4 bg-white border rounded-xl text-gray-800 mb-3 space-y-2" style="margin-top: 2rem;">
                <div class="progress progress2" style="background: #faced7;">
                  <div class="progress__fill2" style="background: #f14668;"></div>
                  <style>
                    .progress__fill2 {
                      width:  <?php echo $english_progress; ?>%
                    }
                  </style>
                </div>
              </div>
              <div class="p-4 bg-white border rounded-xl text-gray-800 mb-3 space-y-2" style="margin-top: 2rem;">
                <div class="progress progress3" style="background: #bbfdd3;">
                  <div class="progress__fill3" style="background: #29fc77;"></div>
                  <style>
                    .progress__fill3 {
                      width:  <?php echo $general_progress; ?>%
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
                      width:  <?php echo $aptitude_progress; ?>%
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
                      width:  <?php echo $logical_progress; ?>%
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