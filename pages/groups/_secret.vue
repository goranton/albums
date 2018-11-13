<template>
  <div>
    <el-row :gutter="20">
      <el-col :xs="20" :md="6">
        <h2>Группы</h2>
      </el-col>
      <el-col :xs="20" :md="14">
        <h2>Фотографии</h2>
      </el-col>
    </el-row>
    <el-row :gutter="20">
      <el-col :xs="20" :md="6">
        <el-steps :space="50" :active="active" finish-status="success" direction="vertical">
          <template v-for="(group, index) in groups">
            <el-step :key="group.id" :title="group.name">
              <a @click="setActive(index)" slot="title">{{ group.name }}</a>
            </el-step>
          </template>
        </el-steps>
      </el-col>
      <el-col :xs="20" :md="14">
        <el-row :gutter="12" v-show="!isLastStep">
          <el-col v-for="(group, id) in groups" v-if="current === id" :key="`group_body_${group.id}`">
            <h1>{{ group.name }}</h1>

            <el-row :gutter="12">
              <el-col :xs="12" :md="12" class="mb" v-for="(element, idx) in group.elements" :key="idx">
                <el-card align="center" shadow="hover">
                  <div slot="header" class="clearfix">
                    <el-input @blur="updateData" v-model="updated[element.id]" placeholder="Фио"></el-input>
                  </div>
                  <div>
                    <img :src="element.photo" width="50%">
                  </div>
                </el-card>
              </el-col>
            </el-row>
          </el-col>
        </el-row>
        <el-row :gutter="12" v-show="isLastStep">
          <el-col>
            <p>Спасибо</p>
          </el-col>
        </el-row>
        <el-button  @click="prev()" v-if="!isFirstStep">Назад</el-button>
        <el-button  @click="next()" v-if="!isLastStep">Следущая</el-button>
      </el-col>
    </el-row>
  </div>
</template>
<script>
  import clone from 'lodash/cloneDeep.js';
  import { mapState } from 'vuex';

  export default {
    meta: { 'title': 'Groups' },
    async asyncData({ store, error, params }) {
      await store.dispatch('groups/getGroups', params.secret)
    },
    computed: {
      ...mapState('groups', {
        groups: state => state.load.groups,
        updatedNames: state => state.load.elements,
      }),
      isLastStep() {
        return this.active === this.groups.length
      },
      isFirstStep() {
        return this.active === 0
      }
    },
    data() {
      return {
        active: 0,
        current: 0,
        updated: {},
      }
    },
    methods: {
      next() {
        if (this.active <= this.groups.length) {
          this.active++;
          // update current
          this.current++;
        } else {
          // update
        }
      },
      prev() {
        if (this.active > 0) {
          this.active--;
          this.current--;
        }
      },
      setActive(index) {
        this.active = index;
        this.current = index;
      },
      async updateData() {
        try {
          await this.$store.dispatch('groups/updateElementNames', this.updated);
          this.$toast.success('Сохранено')
        } catch (e) {
          this.$toast.error('Ошибка сохранения')
        }
      },
    },
    mounted() {
      this.updated = clone(this.updatedNames);
    }
  }
</script>

<style lang="scss">
  .el-tabs__nav {
    display: flex;
  }
  .mb {
    margin-bottom: 10px;
  }
</style>
