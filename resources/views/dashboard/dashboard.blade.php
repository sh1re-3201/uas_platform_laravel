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
      align-items: center;
      padding: 15px 0;
      border-bottom: 1px solid #ddd;
    }
    .job-item:last-child {
      border-bottom: none;
    }
    .apply-btn {
      margin-left: 15px;
    }
    .pagination-container {
      text-align: center;
      margin: 40px 0 20px;
    }
    .pagination-info {
      text-align: center;
      margin-bottom: 20px;
      color: #666;
      font-size: 14px;
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
      @auth
        <a href="#">Profile</a>
        <form action="{{ route('logout') }}" method="POST" style="display:inline;">
          @csrf
          <button type="submit" style="background:none;border:none;color:white;">Logout</button>
        </form>
      @else
        <a href="{{ route('register') }}">Daftar</a>
        <a href="{{ route('login') }}">Masuk</a>
      @endauth
    </div>
  </div>

  <!-- Hero Section -->
  <div class="hero">
    <h1><strong>WE ARE HIRING!</strong></h1>
  </div>

  <!-- Pagination Info -->
  <div class="pagination-info">
    @if($pagination['total_jobs'] > 0)
      Menampilkan {{ $pagination['from'] ?? 0 }} - {{ $pagination['to'] ?? 0 }} dari {{ $pagination['total_jobs'] }} lowongan
    @else
      Tidak ada lowongan tersedia
    @endif
  </div>

  <!-- Job List -->
  <div class="job-list">
    @forelse($jobs as $job)
      <div class="job-item">
        <div>
          <strong>{{ $job->title }}</strong><br>
          {{ $job->description }}
          @if($job->salary_range)
            <br><small class="text-muted">💰 {{ $job->salary_range }}</small>
          @endif
          @if($job->location)
            <br><small class="text-muted">📍 {{ $job->location }}</small>
          @endif
          @if($job->deadline)
            <br><small class="text-muted">⏰ Deadline: {{ $job->deadline->format('d M Y') }}</small>
          @endif
        </div>
        <button 
          class="btn btn-primary btn-sm apply-btn" 
          data-bs-toggle="modal" 
          data-bs-target="#jobModal"
          data-title="{{ $job->title }}"
          data-qualification="@foreach($job->qualifications as $qual)<li>{{ $qual }}</li>@endforeach"
          data-requirements="@foreach($job->requirements as $req)<li>{{ $req }}</li>@endforeach"
          data-salary="{{ $job->salary_range }}"
          data-location="{{ $job->location }}"
          data-deadline="{{ $job->deadline ? $job->deadline->format('d M Y') : 'Tidak ditentukan' }}"
          data-type="{{ $job->jobType->type_name }}"
        >
          Apply
        </button>
      </div>
    @empty
      <div class="text-center py-4">
        <p class="text-muted">Belum ada lowongan pekerjaan tersedia saat ini.</p>
      </div>
    @endforelse
  </div>

  <!-- Pagination -->
  @if($pagination['total_pages'] > 1)
  <div class="pagination-container">
    @if($pagination['has_prev'])
      <a href="{{ $jobs->previousPageUrl() }}">‹ Previous</a>
    @else
      <a href="#" class="disabled">‹ Previous</a>
    @endif

    @for($i = 1; $i <= $pagination['total_pages']; $i++)
      @if($i == $pagination['current_page'])
        <a href="#" class="active">{{ $i }}</a>
      @else
        <a href="{{ $jobs->url($i) }}">{{ $i }}</a>
      @endif
    @endfor

    @if($pagination['has_next'])
      <a href="{{ $jobs->nextPageUrl() }}">Next ›</a>
    @else
      <a href="#" class="disabled">Next ›</a>
    @endif
  </div>
  @endif

  <!-- Modal -->
  <div class="modal fade" id="jobModal" tabindex="-1" aria-labelledby="jobModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
      <div class="modal-content p-3">
        <div class="modal-body">
          <h5 id="modalJobTitle">Job Title</h5>
          <div class="row mt-3">
            <div class="col-md-6">
              <small class="text-muted">💰 Salary: <span id="modalSalary"></span></small>
            </div>
            <div class="col-md-6">
              <small class="text-muted">📍 Location: <span id="modalLocation"></span></small>
            </div>
          </div>
          <div class="row mt-2">
            <div class="col-md-6">
              <small class="text-muted">⏰ Deadline: <span id="modalDeadline"></span></small>
            </div>
            <div class="col-md-6">
              <small class="text-muted">📄 Job Type: <span id="modalType"></span></small>
            </div>
          </div>
          <div class="section-title mt-3">Kualifikasi:</div>
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

  <!-- Bootstrap JS + Modal Script -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  <script>
    const jobModal = document.getElementById('jobModal');
    jobModal.addEventListener('show.bs.modal', function (event) {
      const button = event.relatedTarget;

      const title = button.getAttribute('data-title');
      const qualification = button.getAttribute('data-qualification');
      const requirements = button.getAttribute('data-requirements');
      const salary = button.getAttribute('data-salary');
      const location = button.getAttribute('data-location');
      const deadline = button.getAttribute('data-deadline');
      const type = button.getAttribute('data-type');

      document.getElementById('modalJobTitle').innerText = title;
      document.getElementById('modalQualifications').innerHTML = qualification;
      document.getElementById('modalRequirements').innerHTML = requirements;
      document.getElementById('modalSalary').innerText = salary;
      document.getElementById('modalLocation').innerText = location;
      document.getElementById('modalDeadline').innerText = deadline;
      document.getElementById('modalType').innerText = type;
    });
  </script>

</body>
</html>
