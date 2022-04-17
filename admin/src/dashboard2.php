<?php $pagetitle = "Dashboard";
$activedash = 'bg-indigo-800';
include_once("dashboard.php");
?>

<div class="mt-8">
  <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
    <h2 class="text-lg leading-6 font-medium text-gray-900">Overview</h2>
    <div class="mt-2 grid grid-cols-1 gap-5 sm:grid-cols-2 lg:grid-cols-3">
      <!-- Card -->

      <div class="bg-white overflow-hidden shadow rounded-lg">
        <div class="p-5">
          <div class="flex items-center">
            <div class="flex-shrink-0">
            <i class="fas fa-users fa-2x h-6 w-6 text-gray-400 "></i>
            </div>
            <div class="ml-5 w-0 flex-1">
              <dl>
                <dt class="text-sm font-medium text-gray-500 truncate">
                  Total Christians
                </dt>
                <dd>
                  <div class="text-lg font-medium text-gray-900">
                   <?php echo $countUsers?>
                  </div>
                </dd>
              </dl>
            </div>
          </div>
        </div>
        <div class="bg-indigo-200 px-5 py-3">
          <div class="text-sm">
            <a href="christians" class="font-medium text-cyan-700 hover:text-cyan-900">
              View all
            </a>
          </div>
        </div>
      </div>

      <div class="bg-white overflow-hidden shadow rounded-lg">
        <div class="p-5">
          <div class="flex items-center">
            <div class="flex-shrink-0">
            <i class="fas fa-user fa-2x h-6 w-6 text-gray-400 "></i>
            </div>
            <div class="ml-5 w-0 flex-1">
              <dl>
                <dt class="text-sm font-medium text-gray-500 truncate">
                  Male Christians
                </dt>
                <dd>
                  <div class="text-lg font-medium text-gray-900">
                    <?php echo $countMale;?>
                  </div>
                </dd>
              </dl>
            </div>
          </div>
        </div>
        <div class="bg-indigo-200 px-5 py-3">
          <div class="text-sm">
            <a href="christians" class="font-medium text-cyan-700 hover:text-cyan-900">
              View all
            </a>
          </div>
        </div>
      </div>

      <div class="bg-white overflow-hidden shadow rounded-lg">
        <div class="p-5">
          <div class="flex items-center">
            <div class="flex-shrink-0">
            <i class="fas fa-user fa-2x h-6 w-6 text-gray-400 "></i>
            </div>
            <div class="ml-5 w-0 flex-1">
              <dl>
                <dt class="text-sm font-medium text-gray-500 truncate">
                  Female Christians
                </dt>
                <dd>
                  <div class="text-lg font-medium text-gray-900">
                  <?php echo $countFemale;?>
                  </div>
                </dd>
              </dl>
            </div>
          </div>
        </div>
        <div class="bg-indigo-200 px-5 py-3">
          <div class="text-sm">
            <a href="#" class="font-medium text-cyan-700 hover:text-cyan-900">
              View all
            </a>
          </div>
        </div>
      </div>

    </div>
  </div>

  <h2 class="max-w-6xl mx-auto mt-8 px-4 text-lg leading-6 font-medium text-gray-900 sm:px-6 lg:px-8">
    Recent Christians
  </h2>

  <!-- Activity list (smallest breakpoint only) -->
  <div class="shadow sm:hidden">
    <ul class="mt-2 divide-y divide-gray-200 overflow-hidden shadow sm:hidden">

      <?php
      $sql = "SELECT * FROM users ORDER BY id DESC LIMIT 50";
      $result = $connection->query($sql);
      if ($result->num_rows > 0) {
        // output data of each row
        while ($data = $result->fetch_assoc()) {
      ?>
          <li>
            <a href="christians" class="block px-4 py-4 bg-white hover:bg-indigo-200">
              <span class="flex items-center space-x-4">
                <span class="flex-1 flex space-x-2 truncate">
                <i class="fa fa-user flex-shrink-0 h-5 w-5 text-gray-400"></i>
                  <span class="flex flex-col text-gray-500 text-sm truncate">
                    <span class="truncate"><?php echo $data['name']; ?></span>
                    <span class="text-gray-900 font-medium"><?php echo $data['phone'].""; ?></span>
                    <time datetime="2020-07-11"><?php echo $data['date']; ?></time>
                  </span>
                </span>
                <svg class="flex-shrink-0 h-5 w-5 text-gray-400" x-description="Heroicon name: solid/chevron-right" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                  <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path>
                </svg>
              </span>
            </a>
          </li>
      <?php
        }
      } else {
        echo "0 results";
      }
      ?>


    </ul>

    <!-- <nav class="bg-white px-4 py-3 flex items-center justify-between border-t border-gray-200" aria-label="Pagination">
      <div class="flex-1 flex justify-between">
        <a href="#" class="relative inline-flex items-center px-4 py-2 border border-gray-300 text-sm font-medium rounded-md text-gray-700 bg-white hover:text-gray-500">
          Previous
        </a>
        <a href="#" class="ml-3 relative inline-flex items-center px-4 py-2 border border-gray-300 text-sm font-medium rounded-md text-gray-700 bg-white hover:text-gray-500">
          Next
        </a>
      </div>
    </nav> -->
  </div>

  <!-- Activity table (small breakpoint and up) -->
  <div class="hidden sm:block">
    <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
      <div class="flex flex-col mt-2">
        <div class="align-middle min-w-full overflow-x-auto shadow overflow-hidden sm:rounded-lg">
          <table class="min-w-full divide-y divide-indigo-200" id="example">
            <thead>
              <tr>
                <th class="px-6 py-3 bg-indigo-200 text-left text-xs font-medium text-gray-800 uppercase tracking-wider">
                  Name
                </th>
                <th class="px-6 py-3 bg-indigo-200 text-right text-xs font-medium text-gray-800 uppercase tracking-wider">
                  Phone
                </th>
                <th class="hidden px-6 py-3 bg-indigo-200 text-left text-xs font-medium text-gray-800 uppercase tracking-wider md:block">
                  Date
                </th>
                <th class="px-6 py-3 bg-indigo-200 text-right text-xs font-medium text-gray-800 uppercase tracking-wider">
                  Service
                </th>
              </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">

              <?php
              $sql = "SELECT * FROM users ORDER BY id DESC LIMIT 50";
              $result = $connection->query($sql);
              if ($result->num_rows > 0) {
                // output data of each row
                while ($data = $result->fetch_assoc()) {
              ?>

                  <tr class="bg-white">
                    <td class="max-w-0 w-full px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                      <div class="flex">
                        <a href="#" class="group inline-flex space-x-2 truncate text-sm">
                         <i class="fas fa-user text-gray-500"></i>
                          <p class="text-gray-500 truncate group-hover:text-gray-900">
                            <?php echo $data['name']; ?> </p>
                        </a>
                      </div>
                    </td>
                    <td class="px-6 py-4 text-right whitespace-nowrap text-sm text-gray-500">
                      <span class="text-gray-900 font-medium"><?php echo $data['phone']; ?></span>

                    </td>
                    <td class="hidden px-6 py-4 whitespace-nowrap text-sm text-gray-500 md:block">
                      <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800 capitalize">
                        <?php echo $data['date']; ?>
                      </span>
                    </td>
                    <td class="px-6 py-4 text-right whitespace-nowrap text-sm text-gray-500">
                      <time datetime="2020-07-11"><?php echo $data['service']; ?></time>
                    </td>
                  </tr>
              <?php
                }
              } else {
                echo "0 results";
              }
              ?>

            </tbody>
          </table>
          <div class="bg-indigo-200 px-5 py-3">
          <div class="text-base">
            <a href="christians" class="font-medium text-cyan-700 hover:text-indigo-600">
              View all
            </a>
          </div>
        </div>
        </div>
      </div>
    </div>
  </div>
</div>

<?php
include_once($_SERVER['DOCUMENT_ROOT'] . "/kibeho/api/footer.php");
?>
<!-- SELECT * FROM users ORDER BY id DESC;  -->