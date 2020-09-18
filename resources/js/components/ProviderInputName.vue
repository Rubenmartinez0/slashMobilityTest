<template>
    <div id='provider-input-name'>
        <input disabled id="provider_name" type="provider_name" class="form-control @error('provider_name') is-invalprovider_name @enderror" name="provider_name" :value="providerName" autocomplete="provider_name">

    </div>
</template>

<script>
export default{
    props: ['providerName'],
    mounted(){
        //console.log('Provider name input component mounted')
    },
}


</script>


