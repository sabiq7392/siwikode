$(".delete").click(function(){
  const id = $(this).parents("tr").attr("id")
  const data = $(this).attr("data-url")
  Swal.fire({
    title: 'Are you sure?',
    text: "You won't be able to revert this!",
    icon: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    confirmButtonText: 'Yes, delete it!'
  }).then((result) => {
    if (result.isConfirmed) {
      $.ajax({
        url: 'http://localhost/siwikode/'+data+''+id,
        error: function() {
          alert('Something is wrong')
        },
        success: function() {
          $("#"+id).remove()
          Swal.fire('Deleted!','Your data has been deleted.','success')
        }
      })
    }
  })
})

$(".update").click(function(){
  Swal.fire({
    title: 'Updated!',
    text: 'Your data has been updated.',
    icon: 'success',
    showConfirmButton: false
  })
})

$(".save").click(function(){
  Swal.fire({
    title: 'Saved!',
    text: 'Your data has been saved.',
    icon: 'success',
    showConfirmButton: false
  })
})