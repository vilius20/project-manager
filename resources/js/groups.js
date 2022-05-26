// Getting every form value and putting to URL
const selects = document.querySelectorAll(".students").forEach((select) => {
    select.addEventListener("change", () => {
        const groupForm = document.getElementById("group-form");
        const value = select.value;
        // Values of group ID and student ID
        let arr = value.split(" ");
        // Ready url
        let link = "/assign-student/" + arr[1] + "/" + arr[0];
        // Putting link in action atribute
        groupForm.action = link;
        // Submiting form after select value changes
        groupForm.submit();
    });
});
