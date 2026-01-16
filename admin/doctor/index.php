<?php
require_once '../includes/config.php';
require_once '../includes/functions.php';
check_login();

$page_title = 'Doctors';
include '../includes/header.php';
include '../includes/sidebar.php';
?>
<main class="admin-content">
    <div class="page-header">
        <h1><i class="fas fa-user-md"></i> Doctors</h1>
        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#doctorModal"><i class="fas fa-plus"></i> Add Doctor</button>
    </div>
    <div class="admin-card">
        <div id="doctorTableContainer">
            <!-- Doctor table will be loaded here via AJAX -->
        </div>
    </div>
</main>

<!-- Doctor Add/Edit Modal -->
<div class="modal fade" id="doctorModal" tabindex="-1" aria-labelledby="doctorModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <form id="doctorForm">
        <div class="modal-header">
          <h5 class="modal-title" id="doctorModalLabel">Add Doctor</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <input type="hidden" name="id" id="doctor_id">
          <div class="mb-3">
            <label for="doctor_name" class="form-label">Name</label>
            <input type="text" class="form-control" id="doctor_name" name="name" required>
          </div>
          <div class="mb-3">
            <label for="doctor_title" class="form-label">Title</label>
            <input type="text" class="form-control" id="doctor_title" name="title">
          </div>
          <div class="mb-3">
            <label for="doctor_description" class="form-label">Description</label>
            <textarea class="form-control" id="doctor_description" name="description" rows="3"></textarea>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
          <button type="submit" class="btn btn-primary">Save</button>
        </div>
      </form>
    </div>
  </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
function loadDoctors() {
    $.get('list.php', function(data) {
        $('#doctorTableContainer').html(data);
    });
}

$(document).ready(function() {
    loadDoctors();

    // Add/Edit Doctor
    $('#doctorForm').on('submit', function(e) {
        e.preventDefault();
        $.post('save.php', $(this).serialize(), function(response) {
            $('#doctorModal').modal('hide');
            loadDoctors();
        });
    });

    // Open modal for edit
    $(document).on('click', '.edit-doctor', function() {
        var id = $(this).data('id');
        $.get('get.php', {id: id}, function(data) {
            var doctor = JSON.parse(data);
            $('#doctor_id').val(doctor.id);
            $('#doctor_name').val(doctor.name);
            $('#doctor_title').val(doctor.title);
            $('#doctor_description').val(doctor.description);
            $('#doctorModalLabel').text('Edit Doctor');
            $('#doctorModal').modal('show');
        });
    });

    // Reset modal on close
    $('#doctorModal').on('hidden.bs.modal', function () {
        $('#doctorForm')[0].reset();
        $('#doctor_id').val('');
        $('#doctorModalLabel').text('Add Doctor');
    });

    // Delete Doctor
    $(document).on('click', '.delete-doctor', function() {
        if(confirm('Are you sure you want to delete this doctor?')) {
            var id = $(this).data('id');
            $.post('delete.php', {id: id}, function(response) {
                loadDoctors();
            });
        }
    });
});
</script>
<?php include '../includes/footer.php'; ?>
