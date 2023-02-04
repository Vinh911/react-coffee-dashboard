const DataField = ({ data, label }) => {
    return (
        <div className="data-field">
            <p className="label">{label}</p>
            <p className="data">{data}</p>
        </div>
    );
}

export default DataField;