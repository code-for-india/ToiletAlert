package cfi.hv.com.toiletalert;

import android.app.Fragment;
import android.app.SearchManager;
import android.content.Context;
import android.content.Intent;
import android.support.v4.app.FragmentActivity;
import android.os.Bundle;
import android.support.v7.widget.SearchView;
import android.support.v7.widget.Toolbar;
import android.util.Log;
import android.view.Menu;
import android.view.MenuInflater;
import android.view.MenuItem;
import android.view.View;
import android.widget.ArrayAdapter;
import android.widget.AutoCompleteTextView;
import android.widget.Button;
import android.widget.LinearLayout;
import android.widget.TextView;

import com.google.android.gms.maps.CameraUpdateFactory;
import com.google.android.gms.maps.GoogleMap;
import com.google.android.gms.maps.OnMapReadyCallback;
import com.google.android.gms.maps.SupportMapFragment;
import com.google.android.gms.maps.model.LatLng;
import com.google.android.gms.maps.model.Marker;
import com.google.android.gms.maps.model.MarkerOptions;

import org.json.JSONArray;
import org.json.JSONException;
import org.json.JSONObject;

import java.text.DecimalFormat;

import cfi.hv.com.toiletalert.baseutilities.BaseFragmentActivity;
import cfi.hv.com.toiletalert.constants.Constant;
import cfi.hv.com.toiletalert.dto.Toilet;
import cfi.hv.com.toiletalert.network.Utility;
import cfi.hv.com.toiletalert.network.dto.Response;

public class MapsActivity extends BaseFragmentActivity implements OnMapReadyCallback, View.OnClickListener,GoogleMap.OnMapClickListener, GoogleMap.OnMarkerClickListener {

    private GoogleMap mMap;
    private SearchView searchView = null;
    private AutoCompleteTextView autoCompleteTextView;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_maps);
        // Toolbar mToolbar = (Toolbar) findViewById(R.id.main_toolbar);
        // mToolbar.setVisibility(View.VISIBLE);
        // Obtain the SupportMapFragment and get notified when the map is ready to be used.
        SupportMapFragment mapFragment = (SupportMapFragment) getSupportFragmentManager()
                .findFragmentById(R.id.map);
        mapFragment.getMapAsync(this);
        LinearLayout linearLayoutFooter = (LinearLayout)findViewById(R.id.linear_footer_view);
        autoCompleteTextView= (AutoCompleteTextView) findViewById(R.id.mapsearch);
        Button button_search = (Button)linearLayoutFooter.findViewById(R.id.button_search);
        button_search.setOnClickListener(this);
        Button button_add = (Button)linearLayoutFooter.findViewById(R.id.button_add);
        button_add.setOnClickListener(this);
        Button button_report = (Button)linearLayoutFooter.findViewById(R.id.button_report);
        button_report.setOnClickListener(this);
        sendRequest(10, Constant.URL_SEARCH, new JSONObject());
    }

    String[] arrToielts= new String[1000];

    @Override
    public void onResponseFromServer(Response response) {
        super.onResponseFromServer(response);

        if(response.getResponseID()==10){
            String res = response.getStrResponse();
            Log.d("test",": resr : " + res);
            try {
                JSONObject jMain = new JSONObject(res);
                JSONArray jArrayData = jMain.optJSONArray("data");
                if(jArrayData==null)
                    return;
                Toilet toilet = null;
                for(int i=0;i<jArrayData.length();i++){
                    toilet = new Toilet();
                    toilet.fromJSON(jArrayData.get(i).toString());
                    arrToielts[i]=toilet.getName();
                    addMarker(toilet,false);
                }
                addMarker(toilet,true);
                ArrayAdapter<String> adapter = new ArrayAdapter<String>(this, android.R.layout.simple_dropdown_item_1line, arrToielts);
                autoCompleteTextView.setAdapter(adapter);

            } catch (JSONException e) {
                e.printStackTrace();
            }
        }
    }

    private void addMarker(Toilet toilet,boolean move) {
        double lati = Double.parseDouble(toilet.getLati());
        double logs = Double.parseDouble(toilet.getLongi());
        LatLng latlong = new LatLng(lati, logs);
        String city = toilet.getCity();
        mMap.addMarker(new MarkerOptions().position(latlong).title("Loos in "+ city));
        if (move)
        mMap.moveCamera(CameraUpdateFactory.newLatLng(latlong));
    }

    /**
     * Manipulates the map once available.
     * This callback is triggered when the map is ready to be used.
     * This is where we can add markers or lines, add listeners or move the camera. In this case,
     * we just add a marker near Sydney, Australia.
     * If Google Play services is not installed on the device, the user will be prompted to install
     * it inside the SupportMapFragment. This method will only be triggered once the user has
     * installed Google Play services and returned to the app.
     */
    @Override
    public void onMapReady(GoogleMap googleMap) {
        mMap = googleMap;
        mMap.setOnMarkerClickListener(this);

        // Add a marker in Sydney and move the camera

    }




    @Override
    public boolean onCreateOptionsMenu(Menu menu) {
        super.onCreateOptionsMenu(menu);
        MenuInflater inflater = getMenuInflater();
        inflater.inflate(R.menu.menu_user_actions, menu);
        MenuItem searchItem = menu.findItem(R.id.action_filter);
        SearchManager searchManager = (SearchManager) MapsActivity.this.getSystemService(Context.SEARCH_SERVICE);

        if (searchItem != null) {
            searchView = (SearchView) searchItem.getActionView();
        }
        if (searchView != null) {
            searchView.setSearchableInfo(searchManager.getSearchableInfo(MapsActivity.this.getComponentName()));
            searchView.setOnQueryTextListener(new SearchView.OnQueryTextListener() {
                @Override
                public boolean onQueryTextSubmit(String query) {
                    // Log.e("onQueryTextSubmit", "onQueryTextSubmit" + query);


                    return false;
                }

                @Override
                public boolean onQueryTextChange(String newText) {
                    // Log.e("onQueryTextChange", "onQueryTextChange" + newText);
                    performQuery(newText);
                    return true;
                }
            });
            searchView.setOnCloseListener(new SearchView.OnCloseListener() {
                @Override
                public boolean onClose() {
                    // Log.e("setOnCloseListener", "setOnCloseListener");
                    searchView.onActionViewCollapsed();
                    performQuery(null);
                    return true;
                }
            });
        }

        return super.onCreateOptionsMenu(menu);

    }

    private void performQuery(String newText) {

    }

    @Override
    public void onBackPressed() {
        super.onBackPressed();
//        startActivity(new Intent(Splash.this, PrashnavaliActivity.class));
//        overridePendingTransition(R.anim.push_left_in,
//                R.anim.push_left_out);
        overridePendingTransition(R.anim.push_right_in, R.anim.push_right_out);

    }

    @Override
    public void onClick(View v) {

        switch (v.getId()){

            case R.id.button_search:
                Log.e("clicked", "Search");
                startActivity(new Intent(MapsActivity.this, AddToiletActivity.class));
                overridePendingTransition(R.anim.push_left_in,
                        R.anim.push_left_out);
                break;
            case R.id.button_add:
                Log.e("clicked", "Add");
                startActivity(new Intent(MapsActivity.this, ListActivity.class));
                overridePendingTransition(R.anim.push_left_in,
                        R.anim.push_left_out);
                break;
            case R.id.button_report:
                startActivity(new Intent(MapsActivity.this, ReportsActivity.class));
                overridePendingTransition(R.anim.push_left_in,
                        R.anim.push_left_out);

                break;

        }

    }

    @Override
    public boolean onMarkerClick(Marker marker) {
        Log.e("marker", marker.getId()+ marker.getTitle());
        return false;
    }

    @Override
    public void onMapClick(LatLng latLng) {


        double latitude = latLng.latitude;
        DecimalFormat df = new DecimalFormat("#.###");
        String dx=df.format(latitude);
        latitude=Double.valueOf(dx);
        double longitude = latLng.longitude;
        String dxlong=df.format(longitude);
        longitude=Double.valueOf(dxlong);
        JSONObject jsonObject = new JSONObject();
        try {
            jsonObject.put("lati",""+latitude);
            jsonObject.put("longi",""+longitude);
        } catch (JSONException e) {
            e.printStackTrace();
        }
        sendRequest(10, Constant.URL_SEARCH_LAT_LOG,jsonObject);


    }
}
