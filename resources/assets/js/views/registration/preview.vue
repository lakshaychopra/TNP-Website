<template>
<div>
    <h2>You have been registered Successfully!!</h2>
    <br>
    <form>
        <h5>Preview Data</h5>
        <hr>
        University Roll No:<input type="text"  :value="urn" disabled><br>
        Class Roll No:<input type="text"  :value="crn" disabled><br>
        Branch:<input type="text"  :value="branch" disabled><br>
        Company:<input type="text"  :value="company" disabled><br>
    </form>
</div>        
</template>
<script>
export default {
    name: 'Preview',
    props: ['urn','crn','branch','company']
}
</script>
