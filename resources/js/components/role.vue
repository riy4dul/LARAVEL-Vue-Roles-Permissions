<template>
    <div>
        <h1> A Vue Comsdponokjjkjdent </h1>
    </div>
</template>

<script>
export default {
	data(){
		return{
			permissions:[]
		}
	},

    methods:{
    	getPermissions(){
    		axios.get("http://127.0.0.1:8000/getAllPermission")
    		.then((response)=>{
    			this.permissions =response.data.permission
    		}).catch(()=>{
    			swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Something went wrong!',
                })
    		});
    	}

    },
    created(){
    	this.getPermissions();
    }
}
</script>

