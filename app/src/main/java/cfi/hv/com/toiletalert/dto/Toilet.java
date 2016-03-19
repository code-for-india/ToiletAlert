package cfi.hv.com.toiletalert.dto;



import org.json.JSONException;
import org.json.JSONObject;

import cfi.hv.com.toiletalert.constants.Constant;
import cfi.hv.com.toiletalert.network.Interface.BaseModel;

/**
 * Created by Himanshu Kumar Singh
 * Email : Himanshu.singh@tothenew.com
 * Contact. No : 9560962031
 * Skype id : cs_himanshu
 */
public class Toilet implements BaseModel {

    private int id;
    private String name="";
    private String address1="";
    private String address2="";
    private String city="";
    private String distric="";
    private String state="";
    private String pincode="";
    private String lati="";
    private String longi="";

    public void setName(String name) {
        this.name = name;
    }

    public void setAddress1(String address1) {
        this.address1 = address1;
    }

    public void setAddress2(String address2) {
        this.address2 = address2;
    }

    public void setCity(String city) {
        this.city = city;
    }

    public void setDistric(String distric) {
        this.distric = distric;
    }

    public void setState(String state) {
        this.state = state;
    }

    public void setPincode(String pincode) {
        this.pincode = pincode;
    }

    public void setLati(String lati) {
        this.lati = lati;
    }

    public void setLongi(String longi) {
        this.longi = longi;
    }



    @Override
    public JSONObject toJSON() {
        JSONObject jsonObject = new JSONObject();
        try {

            jsonObject.put("name",name);
            jsonObject.put("address1",address1);
            jsonObject.put("address2",address2);
            jsonObject.put("city",city);
            jsonObject.put("distric",distric);
            jsonObject.put("state",state);
            jsonObject.put("pincode",pincode);
            jsonObject.put("lati",lati);
            jsonObject.put("longi",longi);
        } catch (JSONException e) {
            if(Constant.DEBUG)
            e.printStackTrace();
        }
        return jsonObject;
    }

    public int getId() {
        return id;
    }

    public String getName() {
        return name;
    }

    public String getAddress1() {
        return address1;
    }

    public String getAddress2() {
        return address2;
    }

    public String getCity() {
        return city;
    }

    public String getDistric() {
        return distric;
    }

    public String getState() {
        return state;
    }

    public String getPincode() {
        return pincode;
    }

    public String getLati() {
        return lati;
    }

    public String getLongi() {
        return longi;
    }

    @Override
    public void fromJSON(String json) {
        try {
            JSONObject jsonObject = new JSONObject(json);
            id=jsonObject.optInt("id");
            name=jsonObject.optString("name");
            address1=jsonObject.optString("address1");
            address2=jsonObject.optString("address2");
            city=jsonObject.optString("city");
            distric=jsonObject.optString("distric");
            state=jsonObject.optString("state");
            pincode=jsonObject.optString("pincode");
            lati=jsonObject.optString("lati");
            longi=jsonObject.optString("longi");


        } catch (JSONException e) {
            e.printStackTrace();
        }
    }
}
