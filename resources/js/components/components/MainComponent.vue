<template>
  <div class="main">
    <div class="filter">
      <header-component></header-component>
      <v-container style="margin-top: 80px">
        <div>
          <div class="wrapper">
            <h1 class="title"><span>Web</span>Dev: Изучение веб-разработки с помощью видеоуроков.</h1>
              <a href="#list" style="text-decoration: none;">
                  <button class="button">К видео</button>
              </a>
          </div>
        </div>
      </v-container>
    </div>
  </div>
</template>

<script setup>
import HeaderComponent from './HeaderComponent.vue';
</script>

<style lang="scss" scoped>
.main {
  width: 100%;
  height: 800px;
  background-image: url('../../../assets/img/bacground_main.png');
  background-size: cover;
  background-repeat: no-repeat;
  background-position: center;
}

.filter {
  width: 100%;
  height: 100%;
  background: #00000060;
}

.wrapper {
  width: 516px;
  min-height: 220px;
  margin-top: 119px;
    @media screen and (max-width: 940px ){
        width: 100%;
    }

  .title {
    width: 100%;
    margin: 0;
    font-style: normal;
    font-weight: 700;
    font-size: 40px;
    line-height: 47px;
    color: white;
      @media screen and (max-width: 940px ){
          font-size: 30px;
      }
      @media screen and (max-width: 567px ){
          font-size: 30px;
      }
    span {
      color: #0083E2;
    }
  }

  .button {
    display: block;
    outline: none;
    margin-top: 20px;
    border: none;
    width: 210px;
    height: 50px;
    left: 455px;
    top: 369px;
    background: linear-gradient(180deg, #0083E2 0%, #004E86 100%);
    box-shadow: 0px 0px 8px #0083E2;
    font-style: normal;
    font-weight: 700;
    font-size: 20px;
    line-height: 23px;
    color: #FFFFFF;
    cursor: pointer;
  }
}
</style>
