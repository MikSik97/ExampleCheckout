checkCode(text){
if (this.discount.name===''){
return;
}
axios.post('api/discount',{
discount: this.discount
})
.then(response => (
this.discountAmount = response.data

))
.catch( error =>{
console.log(error.response.data);
})

}
