// Store
import {createStore} from "vuex";

export default createStore({
    state(){
        return {
            loginModel: false,
            auth: false,
            letter: false,
            modalShow: false,
            modalMessage: '',
            modalClass: ''
        }
    },
    mutations:{
        showModel(state){
            state.loginModel = true;
        },
        authCheck(state){
            if(state.auth){
                state.auth = false;
            } else {
                state.auth = true;
            }
        }
    }
});
