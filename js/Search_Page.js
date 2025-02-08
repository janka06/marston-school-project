// Subject search
const subjectInput = document.getElementById('subjectInput');
const subjects = document.querySelectorAll('#subjects li');
const subjectSearchIcon = document.querySelector('.textbox1 .fa-magnifying-glass');
const subjectXmarkIcon = document.querySelector('.textbox1 .fa-xmark');

const updateSubjectDisplay = () => {
  const searchTerm = subjectInput.value.trim().toLowerCase();
  subjectXmarkIcon.style.display = searchTerm ? 'block' : 'none';
  subjectSearchIcon.style.display = searchTerm ? 'none' : 'block';

  subjects.forEach(item => {
    const languageName = item.textContent.toLowerCase();
    item.style.display = languageName.includes(searchTerm) ? 'block' : 'none';
  });
};

subjectInput.addEventListener('input', updateSubjectDisplay);
subjectXmarkIcon.addEventListener('click', () => {
  subjectInput.value = '';
  updateSubjectDisplay();
});

// Subject selection
document.querySelectorAll('#subjects li').forEach(item => {
    item.addEventListener('click', function() {
      // Remove 'selected' class from all subjects
      document.querySelectorAll('#subjects li').forEach(li => li.classList.remove('selected'));
      // Add 'selected' class to the clicked subject
      this.classList.add('selected');
    });
});

// Teacher search
const teacherInput = document.getElementById('teacherInput');
const teachers = document.querySelectorAll('#teachers li');
const teacherSearchIcon = document.querySelector('.textbox2 .fa-magnifying-glass');
const teacherXmarkIcon = document.querySelector('.textbox2 .fa-xmark');

const updateTeacherDisplay = () => {
  const searchTerm = teacherInput.value.trim().toLowerCase();
  teacherXmarkIcon.style.display = searchTerm ? 'block' : 'none';
  teacherSearchIcon.style.display = searchTerm ? 'none' : 'block';

  teachers.forEach(item => {
    const languageName = item.textContent.toLowerCase();
    item.style.display = languageName.includes(searchTerm) ? 'block' : 'none';
  });
};

teacherInput.addEventListener('input', updateTeacherDisplay);
teacherXmarkIcon.addEventListener('click', () => {
  teacherInput.value = '';
  updateTeacherDisplay();
});

// Teacher selection
document.querySelectorAll('#teachers li').forEach(item => {
    item.addEventListener('click', function() {
        // Remove 'selected' class from all teachers
        document.querySelectorAll('#teachers li').forEach(li => li.classList.remove('selected'));
        // Add 'selected' class to the clicked teacher
        this.classList.add('selected');
    });
});