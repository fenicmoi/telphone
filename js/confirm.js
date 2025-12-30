function confirmDelete(url) {
    Swal.fire({
        title: 'คุณแน่ใจหรือไม่?',
        text: "คุณต้องการลบข้อมูลนี้ใช่หรือไม่!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'ใช่, ลบเลย!',
        cancelButtonText: 'ยกเลิก'
    }).then((result) => {
        if (result.value) {
            window.location.href = url;
        }
    })
}

function confirmEdit(callback) {
    Swal.fire({
        title: 'ยืนยันการแก้ไข',
        text: "คุณต้องการแก้ไขข้อมูลนี้ใช่หรือไม่?",
        icon: 'question',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'ใช่, แก้ไข!',
        cancelButtonText: 'ยกเลิก'
    }).then((result) => {
        if (result.value) {
            if (typeof callback === 'function') {
                callback();
            }
        }
    })
}

function confirmAction(url, title, text, icon) {
    Swal.fire({
        title: title || 'คุณแน่ใจหรือไม่?',
        text: text || "คุณต้องการดำเนินการนี้ใช่หรือไม่?",
        icon: icon || 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'ตกลง',
        cancelButtonText: 'ยกเลิก'
    }).then((result) => {
        if (result.value) {
            window.location.href = url;
        }
    })
}

function confirmReset(url) {
    confirmAction(url, 'ยืนยันการ Reset Password', 'รหัสผ่านจะถูกเปลี่ยนเป็น "logon"', 'info');
}
