var parentIdInput= document.getElementById("parentIdInput");
var commentSection= document.getElementById("commentSection");
function clickReply(id) {
    parentIdInput.value=id;
    commentSection.scrollIntoView();
}
