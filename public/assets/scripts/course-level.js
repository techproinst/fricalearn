
document.querySelectorAll('.course-select').forEach(courseSelect => {
    courseSelect.addEventListener('change', function() {
        const courseId = this.value;
        const modal = this.closest('.modal');
        const levelSelect = modal.querySelector('.level-select');

        axios.get(`/courses/${courseId}/levels`)
            .then(response => {
                const levels = response.data;
                levelSelect.innerHTML = '<option value="">Select Level</option>';
                levels.forEach(level => {
                    const option = document.createElement('option');
                    option.value = level.id;
                    option.text = level.level_name;
                    levelSelect.add(option);
                });
            })
            .catch(error => {
                console.error('Error fetching course levels:', error);
                levelSelect.innerHTML = '<option value="">No levels found</option>';
            });
    });
});
