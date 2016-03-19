package cfi.hv.com.toiletalert;

import android.content.Intent;
import android.os.Bundle;
import android.support.v7.widget.Toolbar;
import android.util.Log;
import android.view.View;
import android.widget.AdapterView;
import android.widget.ListView;

import org.json.JSONArray;
import org.json.JSONException;
import org.json.JSONObject;

import java.util.ArrayList;

import cfi.hv.com.toiletalert.adapter.LoosAdapter;
import cfi.hv.com.toiletalert.baseutilities.BaseActivity;
import cfi.hv.com.toiletalert.constants.Constant;
import cfi.hv.com.toiletalert.dto.Toilet;
import cfi.hv.com.toiletalert.network.dto.Response;

public class ListActivity extends BaseActivity implements AdapterView.OnItemClickListener {
private ListView mListView;
    private ArrayList<Toilet> arrToiel = new ArrayList<Toilet>();
    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_reports);
        Toolbar toolbar = (Toolbar) findViewById(R.id.toolbar);
        mListView = (ListView)findViewById(R.id.listview);
        mListView.setOnItemClickListener(this);
        setSupportActionBar(toolbar);
        sendRequest(10, Constant.URL_SEARCH, new JSONObject());
    }



    @Override
    public void onResponseFromServer(Response response) {
        super.onResponseFromServer(response);

        if(response.getResponseID()==10){
            String res = response.getStrResponse();
            Log.d("test", ": resr : " + res);
            try {
                JSONObject jMain = new JSONObject(res);
                JSONArray jArrayData = jMain.optJSONArray("data");
                if(jArrayData==null)
                    return;

                for(int i=0;i<jArrayData.length();i++){
                    Toilet toilet = new Toilet();
                    toilet.fromJSON(jArrayData.get(i).toString());
                    arrToiel.add(toilet);

                }
                setAdapter(arrToiel);
            } catch (JSONException e) {
                e.printStackTrace();
            }
        }
    }

    private void setAdapter(ArrayList<Toilet> toilet) {
        if (toilet != null && !toilet.isEmpty()) {
            LoosAdapter loosAdapter= new LoosAdapter(this, toilet);
            mListView.setAdapter(loosAdapter);
        }
    }

    @Override
    public void onBackPressed() {
        super.onBackPressed();
        overridePendingTransition(R.anim.push_right_in, R.anim.push_right_out);
    }

    @Override
    public void onItemClick(AdapterView<?> parent, View view, int position, long id) {

        Toilet toilet = arrToiel.get(position);
        Intent intent=  new Intent(ListActivity.this, ToiletDetailsActivity.class);
        intent.putExtra("Data",toilet.toJSON().toString());
        startActivity(intent);
        overridePendingTransition(R.anim.push_left_in,
                R.anim.push_left_out);


    }
}
