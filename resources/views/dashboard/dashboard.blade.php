<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>PT.ABCS - Career</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
      background-color: #e6f0ff;
      font-family: 'Segoe UI', sans-serif;
    }

    .topbar {
      background-color: #000;
      color: white;
      padding: 12px 24px;
      display: flex;
      justify-content: space-between;
      align-items: center;
    }

    .topbar .auth-links a {
      color: white;
      margin-left: 20px;
      text-decoration: none;
    }

    .hero {
      text-align: center;
      padding: 50px 20px 20px;
    }

    .job-list {
      max-width: 700px;
      margin: 30px auto;
      background: white;
      padding: 20px;
      border-radius: 10px;
    }

    .job-item {
      display: flex;
      justify-content: space-between;
      padding: 15px 0;
      border-bottom: 1px solid #ddd;
    }

    .apply-btn {
      margin-left: 15px;
    }

    .pagination-container {
      text-align: center;
      margin: 40px 0 20px;
    }

    .modal-content {
      background-color: #5a7391;
      color: white;
    }

    .modal-body {
      background-color: #d9e8ff;
      color: black;
      border-radius: 10px;
      padding: 20px;
    }

    .modal-body h5 {
      text-align: center;
      background-color: #ccc;
      color: black;
      padding: 10px;
      border-radius: 8px;
      font-weight: bold;
    }

    .modal-body .section-title {
      font-weight: bold;
      margin-top: 15px;
    }

    .modal-footer {
      justify-content: space-between;
    }

    .btn-rounded {
      border-radius: 20px;
      padding: 6px 20px;
    }
  </style>
</head>
<body>

  <!-- Header -->
  <div class="topbar">
    <h5>PT.ABCS</h5>
    <div class="auth-links">
      <a href="#">Daftar</a>
      <a href="#">Masuk</a>
    </div>
  </div>

  <!-- Hero Section -->
  <div class="hero">
    <h1><strong>WE ARE HIRING!</strong></h1>
  </div>

  <!-- Job List -->
  <div class="job-list">
    <div class="job-item">
      <div>
        <strong>IT Support</strong><br>
        Menangani dukungan teknis & maintenance sistem kantor.
      </div>
      <button 
        class="btn btn-primary btn-sm apply-btn" 
        data-bs-toggle="modal" 
        data-bs-target="#jobModal"
        data-title="IT Support"
        data-qualification="<li>Minimal lulusan D3/S1 Teknik Informatika</li><li>Memahami troubleshooting hardware dan software</li><li>Mampu bekerja dalam tim</li>"
        data-requirements="<li>CV dan surat lamaran</li><li>Portofolio proyek (jika ada)</li><li>KTP dan ijazah terakhir</li>"
      >
        Apply
      </button>
    </div>

    <div class="job-item">
      <div>
        <strong>UI/UX Designer</strong><br>
        Menangani desain antarmuka web, aplikasi, dan produk digital lainnya.
      </div>
      <button 
        class="btn btn-primary btn-sm apply-btn" 
        data-bs-toggle="modal" 
        data-bs-target="#jobModal"
        data-title="UI/UX Designer"
        data-qualification="<li>Pemahaman prinsip desain UI/UX</li><li>Mampu menggunakan Figma, Adobe XD, dsb.</li><li>Kreatif dan detail-oriented</li>"
        data-requirements="<li>CV dan surat lamaran</li><li>Portofolio desain</li><li>KTP dan ijazah terakhir</li>"
      >
        Apply
      </button>
    </div>
  </div>

  <!-- Pagination -->
  <div class="pagination-container">
    <a href="#">&lt;</a>
    <a href="#">1</a>
    <a href="#">2</a>
    <a href="#">3</a>
    <a href="#">&gt;</a>
  </div>

  <!-- Modal -->
  <div class="modal fade" id="jobModal" tabindex="-1" aria-labelledby="jobModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content p-3">
        <div class="modal-body">
          <h5 id="modalJobTitle">Job Title</h5>
          <div class="section-title">Kualifikasi:</div>
          <ul id="modalQualifications"></ul>
          <div class="section-title">Persyaratan:</div>
          <ul id="modalRequirements"></ul>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-light btn-rounded" data-bs-dismiss="modal">Back</button>
          <button type="button" class="btn btn-success btn-rounded">Apply</button>
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap JS + Dynamic Modal Script -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  <script>
    const jobModal = document.getElementById('jobModal');
    jobModal.addEventListener('show.bs.modal', function (event) {
      const button = event.relatedTarget;
      const title = button.getAttribute('data-title');
      const qualification = button.getAttribute('data-qualification');
      const requirements = button.getAttribute('data-requirements');

      document.getElementById('modalJobTitle').innerText = title;
      document.getElementById('modalQualifications').innerHTML = qualification;
      document.getElementById('modalRequirements').innerHTML = requirements;
    });
  </script>
</body>
</html>