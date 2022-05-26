console.log("Nwss");

const selects = document.querySelectorAll(".students").forEach((select) => {
    select.addEventListener("change", () => {
        const groupForm = document.getElementById("group-form");
        const value = select.value;
        const studentId = value.substring(2);
        const groupId = value.slice(0, 1);
        const link = "/assign-student/" + studentId + "/" + groupId;
        groupForm.action = link;
        groupForm.submit();
    });
});
