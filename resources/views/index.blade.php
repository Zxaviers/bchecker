<!DOCTYPE html>
<html lang="en" class="scroll-smooth">


<head>
  <meta name="description" content="BChecker - Identify hardware bottlenecks for gaming and productivity.">
  <meta name="keywords" content="Bottleneck Checker, Hardware Performance, CPU, GPU, Gaming Performance">
  <meta name="author" content="Zxaviers">
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="https://unpkg.com/@tailwindcss/browser@4"></script>

  <title>BChecker</title>
     <link rel="icon" href="{{ asset('./assets/icon.png') }}" type="image/png">


  <style>
    .card {
      transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    .card:hover {
      transform: translateY(-8px);
      box-shadow: 0 4px 20px rgba(0, 0, 0, 0.2);
    }

    .card-selected {
      border: 2px solid #16a34a;
      background-color: #dcfce7;
    }
  </style>
</head>

<body>
  <!-- Header -->
  <header class="border-b border-gray-400 bg-green-700">
    <div class="mx-auto max-w-screen-xl px-4 py-6 sm:px-6 sm:py-1 lg:px-8">
      <div class="flex items-center justify-between">
        <div>
          <h1 class="text-3xl font-bold text-white sm:text-4xl">BChecker</h1>
          <p class="font-semibold mt-1.5 text-sm text-gray-300">
            A performance analysis tool designed to help you identify and eliminate hardware bottlenecks
            for smoother gaming and faster workflows.
          </p>
        </div>

        <div class="text-green-800">
          <svg width="200" height="200" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 300 300">
            <!-- Monitor -->
            <rect x="50" y="50" width="200" height="140" rx="10" ry="10" fill="currentColor" />
            <!-- Screen -->
            <rect x="65" y="70" width="170" height="100" fill="#FFFFFF" />
            <!-- Text -->
            <text x="150" y="125" font-family="Arial, sans-serif" font-size="24" font-weight="bold" fill="currentColor"
              text-anchor="middle">BChecker</text>
            <!-- Stand -->
            <rect x="135" y="190" width="30" height="40" fill="#333333" />
            <!-- Base -->
            <rect x="100" y="230" width="100" height="10" fill="#333333" />
          </svg>
        </div>
      </div>
    </div>
  </header>


  <!-- Container -->
  <div id="MainContent" class="flex justify-center items-center min-h-screen bg-gray-200">
    <form action="process.php" method="post" class="w-full max-w-7xl p-8 bg-white rounded-3xl shadow-lg space-y-7">
      <h1 class="text-2xl font-bold text-center">Computer configuration</h1>

      <!-- Pilihan CPU, GPU, Screen -->
      <div class="grid grid-cols-1 gap-7 lg:grid-cols-3">
        <!-- Processor -->
        <div class="w-full rounded-lg card" onclick="highlightCard(this)">
          <div class="flex items-center border-2 rounded-lg p-4 shadow-sm">
            <img src="./assets/cpu.png" alt="Processor" class="w-16 h-16">
            <div class="ml-4 flex-1">
              <h2 class="text-lg font-semibold">Processor</h2>
              <span class="text-red-500 text-sm">Required</span>
              <select class="w-full mt-2 border-2 rounded p-2" name="processor" required>
                <option value="">Please select processor</option>
                <option value="BX8071513100">Intel Core i3-13100</option>
                <option value="BX8071513400">Intel Core i5-13400</option>
                <option value="BX8071513700">Intel Core i7-13700</option>
                <option value="BX8071513900">Intel Core i9-13900</option>
              </select>
            </div>
          </div>
        </div>

        <!-- Graphic Card -->
        <div class="w-full rounded-lg card" onclick="highlightCard(this)">
          <div class="flex items-center border-2 rounded-lg p-4 shadow-sm">
            <div class="ml-4 flex-1">
              <h2 class="text-lg font-semibold">Graphic card</h2>
              <span class="text-red-500 text-sm">Required</span>
              <select class="w-full mt-2 border-2 rounded p-2" name="graphic_card" required>
                <option value="">Please select graphic card</option>
                <option value="NV-RTX3050-FE">NVIDIA GeForce RTX 3050</option>
                <option value="NV-RTX3070-FE">NVIDIA GeForce RTX 3070</option>
                <option value="NV-RTX3090-FE">NVIDIA GeForce RTX 3090</option>
              </select>
            </div>
            <img src="./assets/video-card.png" alt="Graphic Card" class="w-16 h-16">
          </div>
        </div>

        <!-- Screen Resolution -->
        <div class="w-full rounded-lg card" onclick="highlightCard(this)">
          <div class="flex items-center border-2 rounded-lg p-4 shadow-sm">
            <div class="ml-4 flex-1">
              <h2 class="text-lg font-semibold">Screen resolution</h2>
              <span class="text-red-500 text-sm">Required</span>
              <select class="w-full mt-2 border-2 rounded p-2" name="screen_resolution" required>
                <option value="">Please select screen resolution</option>
                <option value="1">1280 × 720 (HD 720p)</option>
                <option value="2">1920 × 1080 (FHD 1080p)</option>
              </select>
            </div>
            <img src="./assets/monitor.png" alt="Screen Resolution" class="w-16 h-16">
          </div>
        </div>
      </div>

      <!-- Purpose -->
      <div class="border-2 rounded-lg p-4 shadow-sm max-w-4xl center mx-auto mt-8">
        <h2 class="text-lg font-semibold">Purpose</h2>
        <span class="text-red-500 text-sm">Required</span>

        <!-- Hidden input to hold the selected value -->
        <input type="hidden" name="purpose" id="purposeInput" required>

        <div class="flex justify-around mt-3 gap-4">
          <button type="button" onclick="selectPurpose(1)" id="btnGeneral"
            class="text-center p-4 rounded-lg border hover:bg-gray-100 focus:ring-2 focus:ring-black">
            <img src="./assets/general-task.png" alt="General Tasks" class="w-16 h-16 mx-auto">
            <p class="mt-1 font-medium">General Tasks</p>
          </button>

          <button type="button" onclick="selectPurpose(2)" id="btnGaming"
            class="text-center p-4 rounded-lg border hover:bg-gray-100 focus:ring-2 focus:ring-black">
            <img src="./assets/cpu-task.png" alt="Gaming Tasks" class="w-16 h-16 mx-auto">
            <p class="mt-1 font-medium">Gaming Tasks</p>
          </button>
        </div>
      </div>

      <!-- Tombol Test -->
      <div class="text-center mt-6">
        <button type="button" onclick="handleTestClick()"
          class="bg-green-600 text-white px-6 py-2 rounded-xl hover:bg-green-700">
          Test
        </button>
      </div>

      <!-- Container untuk menampilkan hasil -->
      <div id="resultContainer" class="hidden mt-8 p-6 bg-green-100 border border-green-400 rounded-xl shadow">
        <h2 class="text-xl font-bold mb-4">Configuration Summary</h2>
        <ul class="space-y-2">
          <li><strong>Processor:</strong> <span id="resultProcessor"></span></li>
          <li><strong>Graphic Card:</strong> <span id="resultGPU"></span></li>
          <li><strong>Screen Resolution:</strong> <span id="resultScreen"></span></li>
          <li><strong>Purpose:</strong> <span id="resultPurpose"></span></li>
          <li><strong>BottleneckPercentage:</strong> <span id="bottleneckPercentage"></span></li>
          <li><strong>Notes:</strong> <span id="notes"></span></li>
        </ul>
      </div>
    </form>
  </div>


  <!--Footer-->
  <footer class="bg-gray-100">
    <div class="relative mx-auto max-w-screen-xl px-4 py-16 sm:px-6 lg:px-8 lg:pt-24">
      <div class="absolute end-4 bottom-4 sm:end-6 sm:bottom-6 lg:end-8 lg:bottom-8">
        <a id="btnBackToTop" href="#MainContent"
          class="inline-flex items-center gap-2 rounded-full bg-green-700 p-3 text-white shadow-lg hover:bg-green-600 transition duration-300">
          <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" viewBox="0 0 20 20" fill="currentColor">
            <path fill-rule="evenodd"
              d="M14.707 12.707a1 1 0 01-1.414 0L10 9.414l-3.293 3.293a1 1 0 01-1.414-1.414l4-4a1 1 0 011.414 0l4 4a1 1 0 010 1.414z"
              clip-rule="evenodd" />
          </svg>
          <span class="sr-only">Back to top</span>
        </a>
      </div>

      <div class="lg:flex lg:items-end lg:justify-between">
        <div>
          <div class="flex justify-center text-green-800 lg:justify-start">
            <svg width="300" height="300" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 300 300">
              <!-- Monitor -->
              <rect x="50" y="50" width="200" height="140" rx="10" ry="10" fill="currentColor" />

              <!-- Screen -->
              <rect x="65" y="70" width="170" height="100" fill="#FFFFFF" />

              <!-- Text -->
              <text x="150" y="125" font-family="Arial, sans-serif" font-size="24" font-weight="bold"
                fill="currentColor" text-anchor="middle">BChecker</text>

              <!-- Stand -->
              <rect x="135" y="190" width="30" height="40" fill="#333333" />

              <!-- Base -->
              <rect x="100" y="230" width="100" height="10" fill="#333333" />
            </svg>

          </div>

          <p class="mx-auto mt-6 max-w-md text-center leading-relaxed text-gray-500 lg:text-left">
            A performance analysis tool designed to help you identify and eliminate hardware bottlenecks for smoother
            gaming and faster workflows.
          </p>
        </div>

        <ul class="mt-12 flex flex-wrap justify-center gap-6 md:gap-8 lg:mt-0 lg:justify-end lg:gap-12">
          <li>
            <a class="text-gray-700 transition hover:text-gray-700/75" href="#"> About </a>
          </li>

          <li>
            <a class="text-gray-700 transition hover:text-gray-700/75" href="#"> Services </a>
          </li>

          <li>
            <a class="text-gray-700 transition hover:text-gray-700/75" href="#"> Projects </a>
          </li>

          <li>
            <a class="text-gray-700 transition hover:text-gray-700/75" href="#"> Blog </a>
          </li>
        </ul>
      </div>

      <p class="mt-12 text-center text-sm text-gray-500 lg:text-center">
        Copyright &copy; 2025. All rights reserved.
      </p>
    </div>
  </footer>


  <script>


    function selectPurpose(value) {
      document.getElementById('purposeInput').value = value;
      document.getElementById('btnGeneral').classList.remove('bg-green-100');
      document.getElementById('btnGaming').classList.remove('bg-green-100');

      if (value === 1) {
        document.getElementById('btnGeneral').classList.add('bg-green-100');
      } else if (value === 2) {
        document.getElementById('btnGaming').classList.add('bg-green-100');
      }
    }

    function handleTestClick() {
      const processorSelect = document.querySelector('[name="processor"]');
      const gpuSelect = document.querySelector('[name="graphic_card"]');
      const screenSelect = document.querySelector('[name="screen_resolution"]');
      const purposeInput = document.getElementById('purposeInput');
      const processor = processorSelect.value;
      const gpu = gpuSelect.value;
      const screen = screenSelect.value;
      const purpose = purposeInput.value;

      if (!processor || !gpu || !screen || !purpose) {
        alert("Semua data harus diisi.");
        return;
      }

      const processorText = processorSelect.options[processorSelect.selectedIndex].text;
      const gpuText = gpuSelect.options[gpuSelect.selectedIndex].text;
      const screenText = screenSelect.options[screenSelect.selectedIndex].text;
      const purposeText = (purpose == "1") ? "General Tasks" : (purpose == "2") ? "Gaming Task" : "";
      const formData = new FormData();
      formData.append('processor', processor);
      formData.append('graphic_card', gpu);
      formData.append('screen_resolution', screen);
      formData.append('purpose', purpose);

      fetch('process.php', {
        method: 'POST',
        body: formData
      })
        .then(res => res.json())
        .then(data => {
          if (data.success) {
            document.getElementById('resultProcessor').innerText = processorText;
            document.getElementById('resultGPU').innerText = gpuText;
            document.getElementById('resultScreen').innerText = screenText;
            document.getElementById('resultPurpose').innerText = purposeText;
            document.getElementById('bottleneckPercentage').innerText = data.bottleneck + '%';
            document.getElementById('notes').innerText = data.notes;
            document.getElementById('resultContainer').classList.remove('hidden');
          } else {
            alert(data.message || 'Data tidak ditemukan.');
            document.getElementById('resultContainer').classList.add('hidden');
          }
        })
        .catch(err => {
          console.error('Fetch error:', err);
          alert('Terjadi kesalahan.');
        });

      // easing function (easeInOutQuad)
      function easeInOutQuad(t) {
        return t < 0.5 ? 2 * t * t : -1 + (4 - 2 * t) * t;
      }

      // scroll to Y with custom duration (ms)
      function smoothScrollToY(targetY, duration) {
        const startY = window.scrollY;
        const distance = targetY - startY;
        let startTime = null;

        function step(timestamp) {
          startTime = startTime || timestamp;
          const elapsed = timestamp - startTime;
          const progress = Math.min(elapsed / duration, 1);
          window.scrollTo(0, startY + distance * easeInOutQuad(progress));
          if (elapsed < duration) {
            requestAnimationFrame(step);
          }
        }

        requestAnimationFrame(step);
      }

      document.addEventListener('DOMContentLoaded', () => {
        const btn = document.getElementById('btnBackToTop');
        const targetEl = document.getElementById('MainContent');

        btn.addEventListener('click', e => {
          e.preventDefault();               // cegah jump instant
          const topY = targetEl.offsetTop; // posisi atas elemen
          smoothScrollToY(topY, 1200);     // durasi 1200ms
        });
      });
    }
  </script>


</body>

</html>