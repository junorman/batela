{
@OverRide
public Map<String, String> getParams() lance AuthFailureError{
Map<String, String> params = new HashMap<>();
params.put(« Content-Type », « application/json »);
params.put(« Authorization », « Bearer » + Utils.readSharedSetting(context, « access_token », «  »));
paramètres de retour;{ @Override public Map<String, String> getHeaders() { Map<String, String> params = new HashMap<>(); params.put("Content-Type", "application/json"); params.put("Authorization", "Bearer " + Utils.readSharedSetting(context, "access_token", "")); return params; }
}