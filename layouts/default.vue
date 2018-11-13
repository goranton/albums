<template>
  <div>
    <el-container>
      <nuxt style="width: 100%"/>
    </el-container>
  </div>
</template>

<style lang="scss">
@import url("//unpkg.com/element-ui@2.4.9/lib/theme-chalk/index.css");

.el-header, .el-footer {
  background-color: #B3C0D1;
  color: #333;
  text-align: center;
  line-height: 60px;
}

body {
  background-color: #ecf0f1;
}

body > .el-container {
  margin-bottom: 40px;
}

.el-container:nth-child(5) .el-aside,
.el-container:nth-child(6) .el-aside {
  line-height: 260px;
}

.el-container:nth-child(7) .el-aside {
  line-height: 320px;
}
</style>
