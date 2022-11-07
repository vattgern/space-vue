// Store
import {createStore} from "vuex";

export default createStore({
    state(){
        return {
            loginModel: false
        }
    },
    mutations:{
        showModel(state){
            state.loginModel = true;
        }
    }
});
