<template>
    <div>
        <h2>2. Wybierz dostawę</h2>
        <table v-for="delivery in deliveries">
            <tr>
                <td>
            <label class="container">
              <input v-model="deliveryType" :id="delivery.id" type="radio" name="delivery" :value="delivery.type" v-on:change="isPaid(delivery.price)">
                {{ delivery.name }}
                <span class="radio"></span>
            </label>
                </td>
                <td  class="prize" v-model="deliveryPrice" :value="delivery.price"> {{ delivery.price }} zł</td>
            </tr>
        </table>
      <h2>3. Wybierz formę zapłaty</h2>
            <table v-for="payment in payments">
                <tr>
                    <td>
              <label v-model="paymentType" :value="payment.name" class="container" v-if="(deliveryType === payment.type)">
                <input v-model="paymentType" :value="payment.name" :id="payment.name" type="radio" name="payment">
                  {{ payment.name }}
                <span class="radio"></span>
                </label>
                    </td>
                </tr>
            </table>
    </div>

</template>

<script>


export default {
    props: ['deliveries', 'payments','paid', 'deliveryPrice'],
    data(){
        return{
            deliveryType:'',
            paymentType:''
        }
    },
    methods:{
        isPaid(price){
            this.$emit("deliveryPrice", price)
            if(this.deliveryType !== this.paid)
            this.$emit("paid", this.deliveryType)
        }
    }
}
</script>
