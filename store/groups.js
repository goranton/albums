export const state = () => ({
  load: [],
  lastSecret: '',
  loading: false,
});

export const mutations = {
  setGroups(state, groups) {
    state.load = groups;
  },
  setSecret(state, secret) {
    state.lastSecret = secret;
  }
};

export const actions = {
  async getGroups({ commit }, secret) {
    const { data } = await this.$axios.get(`/groups/${secret}`);
    commit('setGroups', data);
    commit('setSecret', secret);
  },
  async updateElementNames(context, updates) {
    await this.$axios.post(`/elements/update/names`, { updates });
  }
};

export const getters = {
  getGroups(state) {
    return state.load;
  }
};
