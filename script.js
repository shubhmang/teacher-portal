function showAddStudentModal() {
    document.getElementById('add-student-modal').style.display = 'block';
}

function closeAddStudentModal() {
    document.getElementById('add-student-modal').style.display = 'none';
}

function confirmDelete() {
    return confirm("Are you sure you want to delete this item?");
}