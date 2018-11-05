<template>
    <div v-bind:class="defineSmallBoxClassParam">
        <div class="inner">
            <h3> {{numtext}} </h3>

            <p> {{bodytext}} </p>
        </div>
        <div class="icon">
            <i v-bind:class="defineIconClassParam"></i>
        </div>
        <a v-bind:href="url" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
    </div>
</template>

<script>
    export default {
        props:['numtext','bodytext','url','boxclassparam','iconclassparam'],
        computed:{
            defineSmallBoxClassParam: function(){
                 return "small-box " + (this.boxclassparam || "bg-default");
            },
            defineIconClassParam: function(){
                return (this.iconclassparam || null);
            },
        },
    }
</script>

<style scoped>
    
    .primary,
    .bg-secondary,
    .bg-success,
    .bg-danger,
    .bg-warning,
    .bg-info,
    .bg-dark {
        color: #fff!important;
    }
    
    .small-box {
        border-radius: .25rem;
        box-shadow: 0 0 1px rgba(0,0,0,.125), 0 1px 3px rgba(0,0,0,.2);
        position: relative;
        display: block;
        margin-bottom: 20px;
    }

    .small-box:hover {
        text-decoration: none;
    }

    .small-box>.inner {
        padding: 10px;
    }

    .small-box .icon {
        transition: all .3s linear;
        position: absolute;
        top: -10px;
        right: 10px;
        z-index: 0;
        font-size: 90px;
        color: rgba(0,0,0,.3);
    }

    .small-box:hover .icon {
        font-size: 95px;
        color: rgba(0,0,0,.5);
    }
    
    .small-box>.small-box-footer {
        position: relative;
        text-align: center;
        padding: 3px 0;
        color: rgb(226, 226, 226);
        color: rgba(255,255,255,.8);
        display: block;
        z-index: 10;
        background: rgba(0,0,0,.1);
        text-decoration: none;
    }

    .small-box>.small-box-footer:hover {
        color: #fff;
        background: rgba(0,0,0,.15);
    }

    .small-box-footer> a {
        color: rgb(230, 230, 255)!important;
    }

    .small-box-footer> a {        
        text-decoration: none;
    }

    a:hover {
        color: #ffffff;
    }

     a:active {
         color: rgb(230, 230, 255)!important;
     }

    .small-box h3, .small-box p {
        z-index: 5;
    }
    
    .small-box h3 {
        font-size: 38px;
        font-weight: 700;
        margin: 0 0 10px 0;
        white-space: nowrap;
        padding: 0;
    }

    .small-box p {
        font-size: 15px;
    }
    p {
        margin-top: 0;
        margin-bottom: 1rem;
    }
</style>