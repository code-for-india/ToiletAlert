package cfi.hv.com.toiletalert.baseutilities;

import android.os.Bundle;
import android.support.v7.app.AppCompatActivity;



import org.json.JSONObject;

import cfi.hv.com.toiletalert.network.BaseNetwork;
import cfi.hv.com.toiletalert.network.Interface.NetworkResponse;
import cfi.hv.com.toiletalert.network.dto.Request;
import cfi.hv.com.toiletalert.network.dto.Response;


/**
 * Created by Himanshu Kumar Singh
 * Email : Himanshu.singh@tothenew.com
 * Contact. No : 9560962031
 * Skype id : cs_himanshu
 */
public class BaseActivity extends AppCompatActivity {
    private BaseNetwork baseNetwork = null;
//    private BaseFragment baseFragmentVisibile=null;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        baseNetwork = new BaseNetwork(this);
        baseNetwork.setNetworkResponse(new NetworkResponse() {
            @Override
            public void onResponseFromServer(Response response) {
                BaseActivity.this.onResponseFromServer(response);
            }
        });
    }


    protected void sendRequest(int requestId,String url,JSONObject jsonObject){
        Request request = new Request();
        request.setRequestURL(url);
        request.setRequestID(requestId);
        request.setRequestType(Request.RequestType.POST);
        request.setJsonRequest(jsonObject);
        requestToServer(request, true, true);
    }
    public void destroyLoader(int id) {
        getLoaderManager().destroyLoader(id);
    }

    public final void requestToServer(Request request) {
        /**
         * By default, Dilaog will be display on the Screen.
         */
        baseNetwork.requestToServer(request);
    }

/*
    public void sendDataFromActivityToFragment(BaseFragment baseFragment, View view, Object
            sendDataToActivity, int
            id) {
        if(getBaseFragmentVisibile()!=null){
            getBaseFragmentVisibile().onResponseFromActivity(baseFragment,view,
                    sendDataToActivity,id);
        }
    }*/



    public final void requestToServer(Request request, boolean isToShowDialog, boolean isResetLoader) {
        baseNetwork.requestToServer(request, isToShowDialog, isResetLoader);
    }

    public void onResponseFromServer(Response response) {
    }


  /*
    public BaseNetwork getBaseNetwork() {
        return baseNetwork;
    }

  @Override
    public void onResponseFromFragment(BaseFragment baseFragment, View view, Object sendDataToActivity, int id) {

    }

    public void setBaseNetwork(BaseNetwork baseNetwork) {
        this.baseNetwork = baseNetwork;
    }

    public BaseFragment getBaseFragmentVisibile() {
        return baseFragmentVisibile;
    }

    public void setBaseFragmentVisibile(BaseFragment baseFragmentVisibile) {
        this.baseFragmentVisibile = baseFragmentVisibile;
    }
    */
}
